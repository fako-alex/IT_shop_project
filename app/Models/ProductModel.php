<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Request;

// class ProductModel extends Model
// { 
    // use HasFactory;
    // protected $table = 'product';
    // static public function checkSlug($slug)
    // {
    //     return self::where('slug','=',$slug)->count();
    // }
    // static public function getSingle($id)
    // {
    //     return self::find($id);
    // }

    // static public function getRecord()
    // {
    //     return self::select('product.*', 'users.name as created_by_name')
    //     ->join('users', 'users.id', '=', 'product.created_by')
    //     ->where('product.is_delete', '=', 0)
    //     ->orderBy('product.id', 'desc')
    //     ->paginate(50);
    // }
    
    
    // public function getColor(){
    //     return $this->hasMany(ProductColorModel::class,"product_id");
    // }


    // public function getSize(){
    //     return $this->hasMany(ProductSizeModel::class,"product_id");
    // }


    // public function getImage(){
    //     return $this->hasMany(ProductImageModel::class,"product_id")->orderBy('order_by','asc');
    // }

    // static public function getProduct($category_id = '', $subcategory_id = ''){
    
    //     $return = ProductModel::select('product.*', 'users.name as created_by_name','category.name as category_name','category.slug as category_slug', 'sub_category.name as sub_category_name', 'sub_category.slug as sub_category_slug')
    //     ->join('users', 'users.id', '=', 'product.created_by')
    //     ->join('category', 'category.id', '=', 'product.category_id')
    //     ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id');
    //                 if(!empty($category_id)){
    //                     $return = $return->where('product.category_id', '=', $category_id);
    //                 }

    //                 if(!empty($subcategory_id)){
    //                     $return = $return->where('product.sub_category_id', '=', $subcategory_id);
    //                 }

    //                 //13/09/2024
    //                 if (!empty(Request::get('sub_category_id'))) {
    //                     // Récupérer et nettoyer l'identifiant de la sous-catégorie
    //                     $sub_category_id = rtrim(Request::get('sub_category_id'), ',');
                        
    //                     // Convertir la chaîne d'identifiants en tableau
    //                     $sub_category_id_array = explode(",", $sub_category_id);
                    
    //                     // Filtrer les produits par les sous-catégories
    //                     $return = $return->whereIn('product.sub_category_id', $sub_category_id_array);
    //                 }else{

    //                      if (!empty(Request::get('old_category_id'))){
    //                         $return = $return->where('product.category_id', '=', Request::get('old_category_id'));
    //                     }
    
    //                     if (!empty(Request::get('old_sub_category_id'))){
    //                         $return = $return->where('product.sub_category_id', '=', Request::get('old_sub_category_id'));
    //                     }
    //                 }

    //                 if (!empty(Request::get('color_id'))) {
    //                     // Récupérer et nettoyer l'identifiant de la sous-catégorie
    //                     $color_id = rtrim(Request::get('color_id'), ',');
                        
    //                     $color_id_array = explode(",", $color_id);
                        
    //                     $return = $return->join('product_color','product_color.product_id', '=','product.id');

    //                     $return = $return->whereIn('product_color.color_id', $color_id_array);
    //                 }

    //                 if (!empty(Request::get('brand_id'))) {
                        
    //                     $brand_id = rtrim(Request::get('brand_id'), ',');
                        
                        
    //                     $brand_id = explode(",", $brand_id);
                    
                        
    //                     $return = $return->whereIn('product.brand_id', $sub_category_id_array);
    //                 }
    //                 //fin 13/09/2024

    //                 if(!empty(Request::get('start_price')) && !empty(Request::get('end_price'))){

    //                     $start_price = str_replace('FCFA', '', Request::get('start_price'));
    //                     $end_price = str_replace('FCFA', '', Request::get('end_price'));

    //                     $return = $return->where('product.price', '>=', $start_price);
    //                     $return = $return->where('product.price', '<=', $end_price);
    //                 }



        
                    

    //                 $return = $return->where('product.is_delete', '=', 0)
    //                     ->where('product.status', '=', 0)
    //                     ->groupBy('product.id')
    //                     ->orderBy('product.id', 'desc')
    //                     ->paginate(30);

    //     return $return;
    // }

    // static public function getImageSingle($product_id){
    //     return ProductImageModel::where('product_id','=', $product_id)->orderBy('order_by', 'asc')->first();
        
    // }
    
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'product';

    // Vérifie si un slug est déjà utilisé
    public static function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->count();
    }

    // Récupère un produit par ID
    public static function getSingle($id)
    {
        return self::find($id);
    }

    // Récupère les enregistrements avec pagination
    public static function getRecord()
    {
        return self::select('product.*', 'users.name as created_by_name')
            ->join('users', 'users.id', '=', 'product.created_by')
            ->where('product.is_delete', '=', 0)
            ->orderBy('product.id', 'desc')
            ->paginate(50);
    }

    // Relation pour les couleurs des produits
    public function getColor()
    {
        return $this->hasMany(ProductColorModel::class, "product_id");
    }

    // Relation pour les tailles des produits
    public function getSize()
    {
        return $this->hasMany(ProductSizeModel::class, "product_id");
    }

    // Relation pour les images des produits
    public function getImage()
    {
        return $this->hasMany(ProductImageModel::class, "product_id")->orderBy('order_by', 'asc');
    }

    // Récupère les produits avec différents filtres
    public static function getProduct($category_id = '', $subcategory_id = '')
    {
        $query = self::select('product.*', 'users.name as created_by_name', 'category.name as category_name', 'category.slug as category_slug', 'sub_category.name as sub_category_name', 'sub_category.slug as sub_category_slug')
            ->join('users', 'users.id', '=', 'product.created_by')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('sub_category', 'sub_category.id', '=', 'product.sub_category_id');

        // Filtrage par catégorie
        if (!empty($category_id)) {
            $query->where('product.category_id', '=', $category_id);
        }

        // Filtrage par sous-catégorie
        if (!empty($subcategory_id)) {
            $query->where('product.sub_category_id', '=', $subcategory_id);
        }

        // Filtrage par sous-catégories
        if (!empty(Request::get('sub_category_id'))) {
            $sub_category_id_array = explode(",", rtrim(Request::get('sub_category_id'), ','));
            $query->whereIn('product.sub_category_id', $sub_category_id_array);
        } else {
            // Filtrage par ancienne catégorie/sous-catégorie
            if (!empty(Request::get('old_category_id'))) {
                $query->where('product.category_id', '=', Request::get('old_category_id'));
            }

            if (!empty(Request::get('old_sub_category_id'))) {
                $query->where('product.sub_category_id', '=', Request::get('old_sub_category_id'));
            }
        }

        // Filtrage par couleur
        if (!empty(Request::get('color_id'))) {
            $color_id_array = explode(",", rtrim(Request::get('color_id'), ','));
            $query->join('product_color', 'product_color.product_id', '=', 'product.id')
                ->whereIn('product_color.color_id', $color_id_array);
        }

        // Filtrage par marque
        if (!empty(Request::get('brand_id'))) {
            $brand_id_array = explode(",", rtrim(Request::get('brand_id'), ','));
            $query->whereIn('product.brand_id', $brand_id_array);
        }

        // Filtrage par plage de prix
        if (!empty(Request::get('start_price')) && !empty(Request::get('end_price'))) {
            $start_price = str_replace('FCFA', '', Request::get('start_price'));
            $end_price = str_replace('FCFA', '', Request::get('end_price'));
            $query->whereBetween('product.price', [$start_price, $end_price]);
        }

        // Récupération des produits avec suppression et statut
        return $query->where('product.is_delete', '=', 0)
            ->where('product.status', '=', 0)
            ->groupBy('product.id')
            ->orderBy('product.id', 'desc')
            ->paginate(6);
    }

    // Récupère l'image principale d'un produit
    public static function getImageSingle($product_id)
    {
        return ProductImageModel::where('product_id', '=', $product_id)->orderBy('order_by', 'asc')->first();
    }

    
    static public function getSingleSlug($slug){
        return self::where('slug', '=', $slug)
        ->where('product.is_delete', '=', 0)
        ->where('product.status', '=', 0) 
        ->first();
    }
}

