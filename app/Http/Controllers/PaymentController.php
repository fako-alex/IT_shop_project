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
        
        $orders = new OrderModel;
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
        $orders->discount_code = trim($request->discount_code);   
        $orders->shipping_amount = trim($request->shipping_amount); 
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

    }

}
