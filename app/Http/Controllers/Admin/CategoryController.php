<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Auth;
class CategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = CategoryModel::getRecord();
        $data['header_title'] = 'Category';
        return view('admin.category.list', $data);
    }

    public function add(){
        $data['header_title'] = 'Add new Category';
        return view('admin.category.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:category',
            'status' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            // Ajoutez d'autres règles de validation au besoin pour d'autres champs
        ]);
    
        $category = new CategoryModel();
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = trim($request->status);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->created_by = Auth::check() ? Auth::user()->id : null;
        $category->save();
    
        return redirect('admin/category/list')->with('success', 'La catégorie a été ajoutée avec succès');
    }
    
    public function edit($id)
    {
        $data['getRecord'] = CategoryModel::getSingle($id);
        $data['header_title'] = 'Edit Category';
        return view('admin.category.edit', $data);
    }


    //pas encore tester la modificacion de la catégorie
    public function update($id, Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:category,slug,' . $id // Validation correcte pour la mise à jour
        ]);
    
        $category = CategoryModel::getSingle($id);
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->status = trim($request->status);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keywords = trim($request->meta_keywords);
        $category->save();
    
        return redirect('admin/category/list')->with('success', 'La catégorie a été modifiée avec succès');
    }

    public function delete($id)
    {
        $category = CategoryModel::getSingle($id);
        $category->is_delete = 1;
        $category->save();
        return redirect()->back()->with('success', 'La catégorie a été supprimée avec succès');
    }
    
}
