<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use Auth;

class ProductController extends Controller
{
    public function list()
    {
       // $data['getRecord'] = SubCategoryModel::getRecord();
        $data['header_title'] = 'List Product';
        return view('admin.product.list', $data); 
    }

    public function add()
    {
        $data['header_title'] = 'Add New Product';
        return view('admin.product.add', $data);
    }

    public function insert(Request $request)
    {
        $title = trim($request->title);
        $product = new ProductModel();
        $product->title = $title;
        $product->created_by = Auth::user()->id;
        $product->save();
        $slug = Str::slug($title,'-');
        
        $checkSlug = ProductModel::checkSlug($slug);
        if(empty($checkSlug)) {
            $product->slug = $slug;
            $product->save();
        } else {
            $new_slug = $slug.'-'.$product->id;
            $product->slug = $new_slug;
            $product->save();
        }   
        return redirect('admin/product/edit/'.$product->id);    
    }

    public function edit($product_id){
         // $productModel = new ProductModel();
        //$product = $productModel->getSingle($product_id);
       // $product = ProductModel::getSingle($product_id);

        $product = ProductModel::getSingle($product_id);
        if(!empty($product)) {
            $data['product'] = $product;
            $data['header_title'] = 'Edit Product';
            return view('admin.product.edit', $data);
        }else{
            //return redirect('admin/product/list')->with('error', 'Produit non trouver');
            echo'une erreur dans la page productcon';
        }
    }   
    
}
