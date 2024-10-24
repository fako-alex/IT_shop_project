<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use App\Models\OrderModel;

class OrderController extends Controller
{
    public function list()
    {
        $data['getRecord'] = OrderModel::getRecord();
        $data['header_title'] = 'Commandes';
        
        // Passer la variable $data à la vue
        return view('admin.order.list', $data);
    }

    public function order_detail($id){
        $data['getRecord'] = OrderModel::getSingle($id);
        $data['header_title'] = 'Détail Commandes';

        // Passer la variable $data à la vue
        return view('admin.order.detail', $data);
    }
}
