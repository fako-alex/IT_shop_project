<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiscountCodeModel;
use Auth;

class DiscountCodeController extends Controller
{
    public function list()
    {
        // Récupérer les enregistrements des codes de réduction
        $data['getRecord'] = DiscountCodeModel::getRecord();
        $data['header_title'] = 'Code de réduction';
        
        // Passer la variable $data à la vue
        return view('admin.discountcode.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Ajouter un code de réduction';
        return view('admin.discountcode.add', $data);
    }

    public function insert(Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required',
        ]);
    
        // Création d'un nouveau code de réduction
        $DiscountCode = new DiscountCodeModel();
        $DiscountCode->name = trim($request->name);
        $DiscountCode->type = trim($request->type);
        $DiscountCode->percent_amount = trim($request->percent_amount);
        $DiscountCode->expire_date = trim($request->expire_date);
        $DiscountCode->status = trim($request->status);
        $DiscountCode->save();
    
        return redirect('admin/discountcode/list')->with('success', 'Le code de réduction a été ajoutée avec succès');
    }

    public function edit($id)
    {
        $data['getRecord'] = DiscountCodeModel::getSingle($id);
        $data['header_title'] = 'Modifier le code de réduction';
        return view('admin.discountcode.edit', $data);
    }

    public function update($id, Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required',
        ]);

        // Mise à jour du code de réduction
        $DiscountCode = DiscountCodeModel::getSingle($id);
        $DiscountCode->name = trim($request->name);
        $DiscountCode->type = trim($request->type);
        $DiscountCode->percent_amount = trim($request->percent_amount);
        $DiscountCode->expire_date = trim($request->expire_date);
        $DiscountCode->status = trim($request->status);
        $DiscountCode->save();
    
        return redirect('admin/discountcode/list')->with('success', 'Le code de réduction a été modifié avec succès');
    }

    public function delete($id)
    {
        $brand = DiscountCodeModel::getSingle($id);
        $brand->is_delete = 1; // Assurez-vous que ce champ existe
        $brand->save();
        return redirect()->back()->with('success', 'Le code de réduction a été supprimé avec succès');
    }
}
