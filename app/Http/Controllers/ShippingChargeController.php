<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingChargeModel;

class ShippingChargeController extends Controller
{
    public function list()
    {
        // Récupérer les enregistrements des frais d'expédition
        $data['getRecord'] = ShippingChargeModel::getRecord();
        $data['header_title'] = 'Frais d\'expédition';
        
        // Passer la variable $data à la vue
        return view('admin.shipping_charge.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Ajouter un Frais d\'expédition';
        return view('admin.shipping_charge.add', $data);
    }

    public function insert(Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);
    
        // Création d'un nouveau frais d'expédition
        $ShippingCharge = new ShippingChargeModel();
        $ShippingCharge->name = trim($request->name);
        $ShippingCharge->price = trim($request->price);
        $ShippingCharge->status = trim($request->status);
        $ShippingCharge->save();
    
        return redirect('admin/shipping_charge/list')->with('success', 'Les frais d\'expédition ont été ajoutés avec succès');
    }

    public function edit($id)
    {
        $data['getRecord'] = ShippingChargeModel::getSingle($id);
        $data['header_title'] = 'Modifier les frais d\'expédition';
        return view('admin.shipping_charge.edit', $data);
    }

    public function update($id, Request $request)
    {
        // Validation des champs
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $ShippingCharge = ShippingChargeModel::getSingle($id);
        $ShippingCharge->name = trim($request->name);
        $ShippingCharge->price = trim($request->price);
        $ShippingCharge->status = trim($request->status);
        $ShippingCharge->save();
    
        return redirect('admin/shipping_charge/list')->with('success', 'Les frais d\'expédition ont été modifiés avec succès');
    }

    public function delete($id)
    {
        $shippingCharge = ShippingChargeModel::getSingle($id);
        $shippingCharge->is_delete = 0; 
        $shippingCharge->save();
        return redirect()->back()->with('success', 'Les frais d\'expédition ont été supprimés avec succès');
    }

}
