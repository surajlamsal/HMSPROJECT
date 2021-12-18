<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodorder;
use Illuminate\Http\Request;

class FoodOrderController extends Controller
{
    public function index()
    {
        $orders = FoodOrder::orderBy('id', 'DESC')->get();

        return view('admin.modules.foodorder.index', compact('orders'));
    }
}
