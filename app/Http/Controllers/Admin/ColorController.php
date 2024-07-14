<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColorModel;
use Auth;

class ColorController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ColorModel::getRecord();
        $data['header_title'] = 'color';
        return view('admin.color.list', $data);
    }

    public function add(){
        $data['header_title'] = 'Add new Color';
        return view('admin.color.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $color = new ColorModel();
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->created_by = Auth::check() ? Auth::user()->id : null;
        $color->save();
        //dd($request-> all());
    
        return redirect('admin/color/list')->with('success', 'La couleur a été ajoutée avec succès');
    }

    public function edit($id)
    {
        $data['getRecord'] = ColorModel::getSingle($id);
        $data['header_title'] = 'Edit color';
        return view('admin.color.edit', $data);
    }


    //pas encore tester la modificacion du produit
    public function update($id, Request $request)
    {
        $request->validate([
            'name' =>'required',
        ]);

        $color = ColorModel::getSingle($id);
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status = trim($request->status);
        $color->created_by = Auth::check() ? Auth::user()->id : null;
        $color->save();
    
        return redirect('admin/color/list')->with('success', 'La couleur a  été modifiée avec succès');
    }

    public function delete($id)
    {
        $brand = ColorModel::getSingle($id);
        $brand->is_delete = 1;
        $brand->save();
        return redirect()->back()->with('success', 'La couleur a été supprimée avec succès');
    }
}

