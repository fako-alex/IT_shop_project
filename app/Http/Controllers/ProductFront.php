<?php

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
    public function getCategory($slug, $subslug = '') {

        $getCategory = CategoryModel::getSingleSlug($slug);
        $getSubCategory = SubCategoryModel::getSingleSlug($subslug);
        $data['getColor'] = ColorModel::getRecordActive();
        $data['getBrand'] = BrandModel::getRecordActive();

        if(!empty($getCategory) && !empty($getSubCategory)){

            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_description'] = $getSubCategory->meta_description;
            $data['meta_keywords'] = $getSubCategory->meta_keywords;

            $data['getSubCategory'] = $getSubCategory;
            $data['getCategory'] = $getCategory;

            $data['getProduct'] = ProductModel::getProduct($getCategory->id, $getSubCategory->id);
            // dd($data['getProduct']);

            $data['getSubCategoryFilter'] = SubCategoryModel::getRecordSubCategory($getCategory->id);
            //dd($data['getSubCategoryFilter']);

            return view('product.list', $data);
        } 
        else if (!empty($getCategory)){

            $data['getSubCategoryFilter'] = SubCategoryModel::getRecordSubCategory($getCategory->id);
            //dd($data['getSubCategoryFilter']);
            
            $data['getCategory'] = $getCategory;

            $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;

            $data['getProduct'] = ProductModel::getProduct($getCategory->id);
            
            return view('product.list', $data);
        }
        else{
            abort(404);
        }
    }
    
    public function getFilterProductAjax(Request $request){
        
        $getProduct = ProductModel::getProduct();
        return response()->json([
            "status"=>true,
            "success"=>view("product._list", [
                "getProduct"=>$getProduct,
            ])->render(),
            ], 200);
    }
}
