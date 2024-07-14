<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrandModel;
use Auth;

class BrandController extends Controller
{
    public function list()
    {
        $data['getRecord'] = BrandModel::getRecord();
        $data['header_title'] = 'Brand';
        return view('admin.brand.list', $data);
    }

    public function add(){
        $data['header_title'] = 'Add new Brand';
        return view('admin.brand.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brand',
            'status' => 'required'
            // Ajoutez d'autres règles de validation au besoin pour d'autres champs
        ]);
    
        $brand = new BrandModel();
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->status = trim($request->status);
        $brand->meta_title = trim($request->meta_title);
        $brand->meta_description = trim($request->meta_description);
        $brand->meta_keywords = trim($request->meta_keywords);
        $brand->created_by = Auth::check() ? Auth::user()->id : null;
        $brand->save();
    
        return redirect('admin/brand/list')->with('success', 'Cet article a été ajoutée avec succès');
    }

    public function edit($id)
    {
        $data['getRecord'] = BrandModel::getSingle($id);
        $data['header_title'] = 'Edit brand';
        return view('admin.brand.edit', $data);
    }


    //pas encore tester la modificacion du produit
    public function update($id, Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:brand,slug,' . $id // Validation correcte pour la mise à jour
        ]);
    
        $brand = BrandModel::getSingle($id);
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->status = trim($request->status);
        $brand->meta_title = trim($request->meta_title);
        $brand->meta_description = trim($request->meta_description);
        $brand->meta_keywords = trim($request->meta_keywords);
        $brand->save();
    
        return redirect('admin/brand/list')->with('success', 'La marque a été modifiée avec succès');
    }

    public function delete($id)
    {
        $brand = BrandModel::getSingle($id);
        $brand->is_delete = 1;
        $brand->save();
        return redirect()->back()->with('success', 'La catégorie a été supprimée avec succès');
    }

} 
