<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use Auth;

class SubCategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubCategoryModel::getRecord();
        $data['header_title'] = 'Sub Category';
        return view('admin.sub_category.list', $data); 
    }

    
    public function add(){
        $data['getCategory'] = CategoryModel::getRecord();
        $data['header_title'] = 'Add new Sub Category';
        return view('admin.sub_category.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            
            'slug' => 'required|unique:sub_category',
            
            // Ajoutez d'autres règles de validation au besoin pour d'autres champs
        ]);
    
        $subcategory = new SubCategoryModel();
        $subcategory->category_id = trim($request->category_id);
        $subcategory->name = trim($request->name);
        $subcategory->slug = trim($request->slug);
        $subcategory->status = trim($request->status);
        $subcategory->meta_title = trim($request->meta_title);
        $subcategory->meta_description = trim($request->meta_description);
        $subcategory->meta_keywords = trim($request->meta_keywords);
        $subcategory->created_by = Auth::check() ? Auth::user()->id : null;
        $subcategory->save();
    
        return redirect('admin/sub_category/list')->with('success', 'La sous catégorie a été ajoutée avec succès');
    //dd($request->request->all());
    }
    
    public function edit($id)
    {
        $data['getCategory'] = CategoryModel::getRecord();
        $data['getRecord'] = SubCategoryModel::getSingle($id);
        $data['header_title'] = 'Edit Sub Category';
        return view('admin.sub_category.edit', $data);
    }


    //pas encore tester la modificacion de la catégorie
    public function update($id, Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:sub_category,slug,' . $id // Validation correcte pour la mise à jour
        ]);
    
        $subcategory = SubCategoryModel::getSingle($id);
        $subcategory->category_id = trim($request->category_id);
        $subcategory->name = trim($request->name);
        $subcategory->slug = trim($request->slug);
        $subcategory->status = trim($request->status);
        $subcategory->meta_title = trim($request->meta_title);
        $subcategory->meta_description = trim($request->meta_description);
        $subcategory->meta_keywords = trim($request->meta_keywords);
        $subcategory->created_by = Auth::check() ? Auth::user()->id : null;
        $subcategory->save();
    
        return redirect('admin/sub_category/list')->with('success', 'La sous catégorie a été modifiée avec succès');
    }

    public function delete($id)
    {
        $category = SubCategoryModel::getSingle($id);
        $category->is_delete = 1;
        $category->save();
        return redirect()->back()->with('success', 'La sous catégorie a été supprimée avec succès');
    }

}
