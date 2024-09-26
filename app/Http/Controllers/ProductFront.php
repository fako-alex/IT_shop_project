<?php

// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use App\Models\CategoryModel;
// use App\Models\SubCategoryModel;
// use App\Models\ProductModel;
// use App\Models\ColorModel;
// use App\Models\BrandModel;
// use Illuminate\Http\Request;

// class ProductFront extends Controller
// {
//     public function getCategory($slug, $subslug = '') {

        
    //     $getProductSingle = ProductModel::getSingleSlug($slug);
        
    //     $getCategory = CategoryModel::getSingleSlug($slug);
    //     $getSubCategory = SubCategoryModel::getSingleSlug($subslug);
    //     $data['getColor'] = ColorModel::getRecordActive();
    //     $data['getBrand'] = BrandModel::getRecordActive();
    //     $data['getRelatedProduct'] = ProductModel::getRelatedProduct($getProductSingle->id, $getProductSingle->sub_category_id);

    //     if(!empty($getProductSingle)){
            
            
    //         $data['meta_title']       = $getProductSingle->title;
    //         $data['meta_description'] = $getProductSingle->short_description;
    //         $data['getProduct']       = $getProductSingle;

    //         return view('product.detail', $data);
    //     }

    //    else if(!empty($getCategory) && !empty($getSubCategory)){

    //         $data['meta_title'] = $getSubCategory->meta_title;
    //         $data['meta_description'] = $getSubCategory->meta_description;
    //         $data['meta_keywords'] = $getSubCategory->meta_keywords;

    //         $data['getSubCategory'] = $getSubCategory;
    //         $data['getCategory'] = $getCategory;

    //         $getProduct= ProductModel::getProduct($getCategory->id, $getSubCategory->id);
    //         // dd($data['getProduct']);

    //         $page = 0;
    //         if(!empty($getProduct->nextPageUrl())){
    //             $parse_url = parse_url($getProduct->nextPageUrl);
    //             if(!empty($parse_url['query'])){
    //                 parse_str($parse_url['query'], $get_array);
    //                 $page = !empty($get_array['page']) ? $get_array['page'] : 0;
    //             }
    //         }
    //         $data['page'] = $page;

    //         $data['getProduct'] = $getProduct;

    //         $data['getSubCategoryFilter'] = SubCategoryModel::getRecordSubCategory($getCategory->id);
    //         //dd($data['getSubCategoryFilter']);

    //         return view('product.list', $data);
    //     } 
    //     else if (!empty($getCategory)){

    //         $data['getSubCategoryFilter'] = SubCategoryModel::getRecordSubCategory($getCategory->id);
    //         //dd($data['getSubCategoryFilter']);
            
    //         $data['getCategory'] = $getCategory;

    //         $data['meta_title'] = $getCategory->meta_title;
    //         $data['meta_description'] = $getCategory->meta_description;
    //         $data['meta_keywords'] = $getCategory->meta_keywords;

    //         $getProduct = ProductModel::getProduct($getCategory->id);
    //         // dd($getProduct->nextPageUrl());
    //         $page = 0;
    //         if(!empty($getProduct->nextPageUrl())){
    //             $parse_url = parse_url($getProduct->nextPageUrl);
    //             if(!empty($parse_url['query'])){
    //                 parse_str($parse_url['query'], $get_array);
    //                 $page = !empty($get_array['page']) ? $get_array['page'] : 0;
    //             }
    //         }
    //         $data['page'] = $page;

    //         $data['getProduct'] = $getProduct;

    //         return view('product.list', $data);
    //     }
    //     else{
    //         abort(404);
    //     }
    // }
    
    // public function getFilterProductAjax(Request $request){
        
    //     $getProduct = ProductModel::getProduct();

    //     $page = 0;
    //     if(!empty($getProduct->nextPageUrl())){
    //         $parse_url = parse_url($getProduct->nextPageUrl);
    //         if(!empty($parse_url['query'])){
    //             parse_str($parse_url['query'], $get_array);
    //             $page = !empty($get_array['page']) ? $get_array['page'] : 0;
    //         }
    //     }
    //     $data['page'] = $page;

    //     return response()->json([
    //         "status"=>true,
    //         "page"=>$page,
    //         "success"=>view("product._list", [
    //             "getProduct"=>$getProduct,
    //         ])->render(),
    //         ], 200);
    // }
// }


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\ProductModel;
use App\Models\ColorModel;
use App\Models\BrandModel;
use Illuminate\Http\Request;

class ProductFront extends Controller
{

    public function getProductSearch(Request $request){
       
        $data['meta_title'] = 'Search';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';
        $getProduct = ProductModel::getProduct();
        $page = 0;

        if (!empty($getProduct->nextPageUrl())) {
            $parse_url = parse_url($getProduct->nextPageUrl());
            if (!empty($parse_url['query'])) {
                parse_str($parse_url['query'], $get_array);
                $page = !empty($get_array['page']) ? $get_array['page'] : 0;
            }
        }
        $data['page'] = $page;

        $data['getProduct'] = $getProduct;
        $data['getColor'] = ColorModel::getRecordActive();
        $data['getBrand'] = BrandModel::getRecordActive();
        
        return view('product.list', $data);
    }

    

    public function getCategory($slug, $subslug = '') {
        $getProductSingle = ProductModel::getSingleSlug($slug);
        $getCategory = CategoryModel::getSingleSlug($slug);
        $getSubCategory = SubCategoryModel::getSingleSlug($subslug);
        
        $data['getColor'] = ColorModel::getRecordActive();
        $data['getBrand'] = BrandModel::getRecordActive();
        
        // Vérification de $getProductSingle avant d'accéder à ses propriétés
        if ($getProductSingle) {
            $data['getRelatedProduct'] = ProductModel::getRelatedProduct($getProductSingle->id, $getProductSingle->sub_category_id);
            $data['meta_title'] = $getProductSingle->title;
            $data['meta_description'] = $getProductSingle->short_description;
            $data['getProduct'] = $getProductSingle;

            return view('product.detail', $data);
        }

        // Vérification des catégories et sous-catégories
        if (!empty($getCategory) && !empty($getSubCategory)) {
            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_description'] = $getSubCategory->meta_description;
            $data['meta_keywords'] = $getSubCategory->meta_keywords;

            $data['getSubCategory'] = $getSubCategory;
            $data['getCategory'] = $getCategory;

            $getProduct = ProductModel::getProduct($getCategory->id, $getSubCategory->id);
            $page = 0;

            if (!empty($getProduct->nextPageUrl())) {
                $parse_url = parse_url($getProduct->nextPageUrl());
                if (!empty($parse_url['query'])) {
                    parse_str($parse_url['query'], $get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
            $data['page'] = $page;
            $data['getProduct'] = $getProduct;
            $data['getSubCategoryFilter'] = SubCategoryModel::getRecordSubCategory($getCategory->id);

            return view('product.list', $data);

        } else if (!empty($getCategory)) {
            $data['getSubCategoryFilter'] = SubCategoryModel::getRecordSubCategory($getCategory->id);
            $data['getCategory'] = $getCategory;
            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;

            $getProduct = ProductModel::getProduct($getCategory->id);
            $page = 0;

            if (!empty($getProduct->nextPageUrl())) {
                $parse_url = parse_url($getProduct->nextPageUrl());
                if (!empty($parse_url['query'])) {
                    parse_str($parse_url['query'], $get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
            $data['page'] = $page;
            $data['getProduct'] = $getProduct;

            return view('product.list', $data);
        } else {
            abort(404);
        }
    }

    public function getFilterProductAjax(Request $request) {
        $getProduct = ProductModel::getProduct();
        $page = 0;

        if (!empty($getProduct->nextPageUrl())) {
            $parse_url = parse_url($getProduct->nextPageUrl());
            if (!empty($parse_url['query'])) {
                parse_str($parse_url['query'], $get_array);
                $page = !empty($get_array['page']) ? $get_array['page'] : 0;
            }
        }
        $data['page'] = $page;

        return response()->json([
            "status" => true,
            "page" => $page,
            "success" => view("product._list", [
                "getProduct" => $getProduct,
            ])->render(),
        ], 200);
    }
}

