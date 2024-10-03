<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use Darryldecode\Cart\Facades\CartFacade as Cart;


class PaymentController extends Controller
{
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

}
