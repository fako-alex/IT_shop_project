<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BrandModel;
use App\Models\ColorModel;
use App\Models\ProductColorModel;
use App\Models\ProductSizeModel;
use App\Models\SubCategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ProductImageModel;
use Auth;

class ProductController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ProductModel::getRecord();
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

        $product = ProductModel::getSingle($product_id);
        if(!empty($product))
         {
            $data['getCategory'] = CategoryModel::getRecordActive();
            $data['getSubCategory'] = SubCategoryModel::getRecordActive();
            $data['getBrand'] = BrandModel::getRecordActive();
            $data['getColor'] = ColorModel::getRecordActive();
            $data['product'] = $product;
           // $data['get_sub_category'] = SubCategoryModel::getRecordSubCategory($product->category_id);
            $data['header_title'] = 'Edit Product';
            return view('admin.product.edit', $data);
        }else{
            abort(404);
        }
    }   
 
    public function update($product_id, Request $request){	
        //dd($request->all());
        $product = ProductModel::getSingle($product_id);
        if(!empty($product))
        {   

            $product->title = trim($request->title);
            $product->sku = trim($request->sku);
            $product->category_id = trim($request->category_id);
            $product->sub_category_id = trim($request->sub_category_id);
            $product->brand_id = trim($request->brand_id);
            //$product->color_id = trim($request->color_id);
            $product->price = trim($request->price);
            $product->old_price = trim($request->old_price);
            //$product->product_price = trim($request->product_price);
            $product->description = trim($request->description);
            $product->short_description = trim($request->short_description);
            $product->additional_information = trim($request->additional_information);
            $product->shipping_returns = trim($request->shipping_returns);
            $product->status = trim($request->status);
            $product->save();

            ProductColorModel::DeleteRecord($product->id);

            if (!empty($request->color_id))
            {
                foreach ($request->color_id as $color_id)
                {
                    $color = new ProductColorModel;
                    $color->color_id = $color_id;
                    $color->product_id = $product->id;
                    $color->save();
                }

            }

            ProductSizeModel::DeleteRecord($product->id);

            if (!empty($request->size))
            {
                foreach ($request->size as $size)
                {   //dd($size['name']);
                    //dd($request->all());

                    if(!empty($size['name']))
                    {
                        $saveSize = new ProductSizeModel;
                        $saveSize->name = $size['name'];
                        $saveSize->price = !empty($size['price']) ? $size['price'] : 0;
                        $saveSize->product_id = $product->id;
                        $saveSize->save();
                    }
                }

            }

        //     if (!empty($request->file('image')))
        //     {

        //         foreach($request->file('image') as $value)
        //         {

        //             if ($value->isValid())
        //             {

        //                 $ext = $value->getClientOriginalExtension();
        //                 $randomStr = $product->id.Str::random(20);
        //                 $filename = strtolower($randomStr).'.'.$ext;
        //                 $value->move('uploads/products/', $filename);

        //                 $imageupload = new ProductImageModel;
        //                 $imageupload->image_name = $filename;
        //                 $imageupload->image_extension = $ext;
        //                 $imageupload->product_id = $product->id;
        //                 $imageupload->save();
                        
        //             }
        //         }
        //     }

        // return redirect()->back()->with('success',"Le produit a été modifier avec succès");
        // }
        // else
        // {
        //     abort(404);
        // }



        if ($request->hasFile('image')) { // Vérifie si des fichiers ont été uploadés

            // Vérifie et crée le dossier s'il n'existe pas
            if (!is_dir(public_path('uploads/products'))) {
                mkdir(public_path('uploads/products'), 0755, true);
            }
        
            foreach ($request->file('image') as $index => $file) {
                if ($file->isValid()) { // Vérifie si le fichier est valide
                    $ext = $file->getClientOriginalExtension(); // Récupère l'extension du fichier
                    $randomStr = $product->id . '_' . Str::random(20); // Génère un nom de fichier unique
                    $filename = strtolower($randomStr) . '.' . $ext; // Construit le nom du fichier
        
                    try {
                        // Tente de déplacer le fichier dans le dossier 'uploads/products/'
                        $file->move(public_path('uploads/products/'), $filename);
        
                        // Enregistre l'image dans la base de données
                        $imageupload = new ProductImageModel;
                        $imageupload->product_id = $product->id;
                        $imageupload->image_name = $filename;
                        $imageupload->image_extension = $ext;
                        $imageupload->order_by = $index + 1; // Utilisation de l'index pour l'ordre
                        $imageupload->created_at = now(); // Date de création
                        $imageupload->updated_at = now(); // Date de mise à jour
                        $imageupload->save();
                    } catch (\Exception $e) {
                        // Gestion de l'erreur si le déplacement échoue
                        return back()->withErrors(['error' => 'Erreur lors du téléchargement de l\'image: ' . $e->getMessage()]);
                    }
                }
            }
        }
        
        // Redirige avec un message de succès
        return redirect()->back()->with('success', "Le produit a été modifié avec succès");
        

    




        
        }
    }
    
}