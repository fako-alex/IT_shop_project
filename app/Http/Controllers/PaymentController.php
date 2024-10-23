<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use App\Models\DiscountCodeModel;
use App\Models\ShippingChargeModel;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\ColorModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Illuminate\Support\Facades\Session;



class PaymentController extends Controller
{
    public function apply_discount_code(Request $request){
        $request->validate([
            'discount_code' => 'required|string'
        ]);
    
        // Vérifier le code de réduction
        $getDiscount = DiscountCodeModel::checkDiscount($request->discount_code);
        
        if(!empty($getDiscount)){

            $total = Cart::getSubTotal();
            if($getDiscount->type == 'Amount'){
                $discount_amount = $getDiscount->percent_amount;
                $payable_total = $total - $getDiscount->percent_amount;
            }
            else{
                $discount_amount = ($total * $getDiscount->percent_amount) / 100;
                $payable_total = $total - $discount_amount;
            }

            $json['status'] = true;
            $json['discount_amount'] = number_format($discount_amount, 2);
            $json['payable_total'] = $payable_total;
            $json['message'] = 'Le code de réduction est valide';
            
        }
        else{
            $json['status'] = false;
            $json['discount_amount'] = '0.00';
            $json['payable_total'] = Cart::getSubTotal();
            $json['message'] = 'Le code de réduction est invalide';
        }
    
        return response()->json($json);
    }
    public function add_to_cart(Request $request) {

        $getProduct = ProductModel::getSingle($request->product_id);
        $total = $getProduct->price; // Utiliser le prix de base du produit

        // Vérifier si une taille est sélectionnée
        if (!empty($request->size_id)) {
            $size_id = $request->size_id;
            $getSize = ProductSizeModel::getSingle($size_id);

            $size_price = !empty($getSize->price) ? $getSize->price : 0;
            $total = $total + $size_price; // Ajouter le prix de la taille au prix total
        } else {
            $size_id = 0;
        }
        $color_id = !empty($request->color_id) ? $request->color_id : 0;

        // Ajouter le produit au panier
        Cart::add([
            'id' => $getProduct->id, // L'ID du produit
            'name' => 'Product',  // Le nom du produit
            'price' => $total,            // Le prix total
            'quantity' => $request->qty,       // Quantité sélectionnée
            'attributes' => array(
                'size_id' => $size_id,
                'color_id' => $color_id,
            
            )
        ]);

        // dd($request->all());
        return redirect()->back();
    }

    public function cart(Request $request){
        // dd(Cart::getContent());
        $data['meta_title'] = 'Cart';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('payment.cart', $data);
    }
    public function cart_delete($id){
        Cart::remove($id);
        return redirect()->back();
        
    }
    public function update_cart(Request $request){
        //dd($request->all());
       foreach($request->cart as $cart){
            Cart::update($cart['id'],array(
                'quantity' => array(
                'relative'=>false, 
                'value' => $cart['qty']),
            ));
       }
        return redirect()->back();
    }

    public function checkout(Request $request){
        // dd(Cart::getContent());
        $data['meta_title'] = 'checkout';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $data['getShipping'] = ShippingChargeModel::getRecordActive();

        return view('payment.checkout', $data);
    }

    public function place_order(Request $request){
        
        $validate = 0;
        $message = '';

        if(!empty(Auth::check())){
            $user_id = Auth::user()->id;
        }else{
            if(!empty($request->is_create)){
                $checkEmail = User::checkEmail($request->email);
                if(!empty($checkEmail)){
                    $message = 'Cette Addresse Email est déjà utilisé pour un compte';
                    $validate = 1;
                }else{
                    $save = new User;
                    $save->name = trim($request->first_name);
                    $save->email = trim($request->email);
                    $save->password = Hash::make($request->password);
                    $save->save();
    
                    $user_id = $save->id;
                }
            }else{
                $user_id = '';
            }
        }


        if(empty($validate)){
            $getShipping = ShippingChargeModel::getSingle($request->shipping);
            $payable_total = Cart::getSubTotal();
            $discount_amount = 0;
            $discount_code = '';

            if(!empty($request->discount_code)){

                $getDiscount = DiscountCodeModel::checkDiscount($request->discount_code);

                if(!empty($request->discount_code)){
                    $discount_code = $request->discount_code;

                    if($getDiscount->type == 'Amount'){
                        $discount_amount = $getDiscount->percent_amount;
                        $payable_total = $payable_total - $getDiscount->percent_amount;
                    }
                    else{
                        $discount_amount = ($payable_total * $getDiscount->percent_amount) / 100;
                        $payable_total = $payable_total - $discount_amount;
                    }
                }
            }
            $shipping_amount = !empty($getShipping->price) ? $getShipping->price : 0;
            $total_amount = $payable_total + $shipping_amount;

            $orders = new OrderModel;

            if(!empty($user_id)){
                $orders->user_id = trim($user_id);
            }

            $orders->first_name = trim($request->first_name);
            $orders->last_name = trim($request->last_name);
            $orders->company_name = trim($request->company_name);
            $orders->county = trim($request->county);
            $orders->address_one = trim($request->address_one);
            $orders->address_two = trim($request->address_two);
            $orders->city = trim($request->city);
            $orders->state = trim($request->state);
            $orders->postcode = trim($request->postcode);
            $orders->phone = trim($request->phone);
            $orders->email = trim($request->email);
            $orders->notes = trim($request->notes);
            $orders->discount_code = trim($discount_code);   
            $orders->discount_amount = trim($discount_amount);   
            $orders->shipping_id = trim($request->shipping); 
            $orders->shipping_amount = trim($shipping_amount); 
            $orders->total_amount = trim($total_amount); 
            $orders->payment_method = trim($request->payment_method);
            $orders->save();
            
            foreach(Cart::getContent() as $key => $cart){
            
                $order_item = new OrderItemModel;
                $order_item->order_id = $orders->id;
                $order_item->product_id = $cart->id;
                $order_item->quantity = $cart->quantity;
                $order_item->price = $cart->price;

                $color_id = $cart->attributes->color_id;
                if(!empty($color_id)){

                    $getColor = ColorModel::getSingle($cart->attributes->color_id);
                    $order_item->color_name = $getColor->name;
                }

                $size_id = $cart->attributes->size_id;
                if(!empty($size_id)){

                    $getSize = ProductSizeModel::getSingle($size_id);
                    $order_item->size_name = $getSize->name;
                    $order_item->size_amount = $getSize->price;
                }
                $order_item->total_price = $cart->price;
                $order_item->save();
            }
            $json['status'] = 'true';
            $json['message'] = "success";
            $json['redirect'] = url('checkout/payment?order_id='.base64_encode($orders->id));
            // $json['message'] = 'Veuillez remplir tous les champs obligatoires';

        }else{
            $json['status'] = 'false';
            $json['message'] = $message;
            // $json['message'] = 'Veuillez remplir tous les champs obligatoires';
        }
        echo json_encode($json);
    } 

    public function checkout_payment(Request $request){
        if(!empty(Cart::getSubTotal()) && !empty($request->order_id)){
            $order_id = base64_decode($request->order_id);
            $getOrder = OrderModel::getSingle($order_id);
            if(!empty($getOrder)){
                if($getOrder->payment_method == 'cash'){
                    $getOrder->is_payment = 1;
                    $getOrder->save();

                    Cart::clear();

                    return redirect('cart')->with('success', "Commande placée avec succès");
                }
                elseif($getOrder->payment_method == 'paypal'){
                    
                    $query                  = array();
                    // $query['business']      = "vipulbusinee1@gmail.com";
                    $query['business']      = "sb-toto@business.example.com";
                    $query['cmd']           = '_xclick';
                    $query['item_name']     = "E-commerce";
                    $query['no_shipping']   = '1';
                    $query['item_number']   = $getOrder->id;
                    $query['amount']        = $getOrder->total_amount;
                    $query['currency_code'] = 'USD'; //pour les devices de paypal : USD (Dollar américain) EUR (Euro) GBP (Livre sterling)  CAD (Dollar canadien)
                    $query['cancel_return'] = url('checkout');
                    $query['return']        = url('paypal/success-payment');

                    $query_string = http_build_query($query);

                    header('Location: https://www.sandbox.paypal.com/cgi-bin/webscr?'.$query_string);
                    //header('Location: https://www.paypal.com/cgi-bin/webscr?'.$query_string); pour rediriger vers le bon compte paypal vid 63
                   exit();
                }
                elseif($getOrder->payment_method == 'stripe'){
                    Stripe::setApiKey(env('STRIPE_SECRET'));
                    $finalprice = $getOrder->total_amount * 100;
                    $session = \Stripe\Checkout\Session::create([
                        'customer_email' => $getOrder->email,
                        'payment_method_types' => ['card'],
                        'line_items' => [[
                            'price_data' =>[
                                'currency' =>'USD',
                                'product_data' =>[
                                    'name' => 'E-commerce',
                                ],
                                'unit_amount' => intval($finalprice),
                            ],
                            'quantity' => 1,
                        ]],
                        'mode' =>'payment',
                        // 'success_url' => url('checkout/success?order_id='.base64_encode($getOrder->id)),
                        'success_url' => url('stripe/payment-success'),
                        'cancel_url' => url('checkout'),
                    ]);
                    
                    $getOrder->stripe_session_id = $session['id'];
                    $getOrder->save();

                    $data['session_id'] = $session['id'];
                    Session::put('stripe_session_id', $session['id']);
                    $data['setPublicKey'] = env('STRIPE_KEY');

                    return view('payment.stripe_charge', $data);


                }
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
    }

    public function paypal_success_payment(Request $request){
        dd($request->all());
        if(!empty($request->item_number) && !empty($request->st) && $request->st =='completed'){
            $getOrder = OrderModel::getSingle($request->item_number);
            if(!empty($getOrder)){
                
                $getOrder->is_payment = 1;
                $getOrder->transaction_id = $request->tx;
                $getOrder->payment_data = json_encode($request->all());
                $getOrder->save();

                Cart::clear();

                return redirect('cart')->with('success', "Commande placée avec succès");
            
            }else{
                abort(404);
            }
        }else{
            abort(404);
        }
        // dd($request->all());
       // return redirect('cart')->with('success', "Paiement effectué avec succès");
    }


    public function stripe_payment_success(Request $request){
        $trans_id = Session::get('stripe_session_id');
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $getdata = \Stripe\Checkout\Session::retrieve($trans_id);
        // dd($getdata);
        $getOrder = OrderModel::where('stripe_session_id', '=', $getdata->id)->first();

        if(!empty($getOrder) && !empty($getdata->id) && $getdata->id == $getOrder->stripe_session_id){
            $getOrder->is_payment = 1;
            $getOrder->transaction_id = $getdata->id;
            $getOrder->payment_data = json_encode($getdata);
            $getOrder->save();

            Cart::clear();

            return redirect('cart')->with('success', "Commande placée avec succès");
        }else{
            return redirect('cart')->with('error', "En raison d'une erreur, veuillez réessayer");
        }
    }

}
