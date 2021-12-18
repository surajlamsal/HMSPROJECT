<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Food;
use App\Models\Foodorder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FoodController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:food-list|food-create|food-edit|food-delete', ['only' => ['index']]);
        $this->middleware('permission:food-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:food-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:food-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $base_table = (new Food())->getTable();
        $food = Food::select('*')
            ->where([
                ['deletedstatus', '=', '0']
            ])
            ->get();
        //dd($food);
        return view('admin.modules.food.index', compact('food', 'base_table'));
    }

    public function create()
    {
        return view('admin.modules.food.add');
    }

    public function store(Request $request)
    {
        $food = new Food;
        $food->foodname = $request->input('foodname');
        $food->foodprice = $request->input('foodprice');
        $food->mealtype = $request->input('mealtype');

        $food->save();
        Session::put('operationMessage', 'insertSuccess');
        return redirect('/food');
    }

    public function edit($id)
    {


        $food = Food::find($id);
        return view('admin.modules.food.edit', compact('food'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate(['price' => 'required|integer']);


        $food = Food::find($id);
        $food->foodname = $request->input('foodname');
        $food->foodprice = $request->input('foodprice');
        $food->mealtype = $request->input('mealtype');

        $food->update();
        Session::put('operationMessage', 'updateSuccess');
        return redirect('/food');
    }
}
