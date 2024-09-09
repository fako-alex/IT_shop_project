<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use APP\Models\ProductModel;
use Illuminate\Http\Request;

class ProductFront extends Controller
{
    public function getCategory($slug, $subslug = '') {

        $getCategory = CategoryModel::getSingleSlug($slug);
        $getSubCategory = SubCategoryModel::getSingleSlug($subslug);

        if(!empty($getCategory) && !empty($getSubCategory)){

            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_description'] = $getSubCategory->meta_description;
            $data['meta_keywords'] = $getSubCategory->meta_keywords;


            $data['getSubCategory'] = $getSubCategory;
            $data['getCategory'] = $getCategory;

            // $data['getProduct'] = ProductModel::getProduct($getCategory->id, $getSubCategory->id);

            return view('product.list', $data);
        } 
        elseif(!empty($getCategory)){

            $data['getCategory'] = $getCategory;

            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;

            // $data['getProduct'] = ProductModel::getProduct($getCategory->id);

            return view('product.list', $data);
        }
        else{
            abort(404);
        }
    }



    // public function getCategory($slug){
        
    //     return view('product.list');
    //     // if(!empty($slug)){
    //     // }
    //     // else{
    //     //     abort(404);
    //     // }
    // }
}
