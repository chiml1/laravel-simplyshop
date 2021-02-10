<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $pizzas = Pizza::orderBy('id', 'asc')->get();
        return view('admin.pizze', ['pizzas' => $pizzas]);
    }

    public function create()
    {
        return view('admin.addpizza');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer|max:50',
            'name' => 'required|min:1|max:50',
            'ingredients' => 'required|min:1|max:50',
            'price_s' => 'required|numeric|between:0,99.99',
            'price_m' => 'required|numeric|between:0,99.99',
            'price_l' => 'required|between:0,99.99',
        ]);

        $pizza = new Pizza();
        $pizza->id = $request->id;
        $pizza->name = $request->name;
        $pizza->ingredients = $request->ingredients;
        $pizza->price_s = $request->price_s;
        $pizza->price_m = $request->price_m;
        $pizza->price_l = $request->price_l;

        if ($pizza->save()) {
            return redirect('admin/pizze');
        }
        return "Błąd";
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $pizza = Pizza::find($id);
        return view('admin.editpizza', ['pizza'=>$pizza]);
    }

    public function update(Request $request, $id)
    {
        $pizza = Pizza::find($id);
        $pizza->id = $id;
        $pizza->name = $request->name;
        $pizza->ingredients = $request->ingredients;
        $pizza->price_s = $request->price_s;
        $pizza->price_m = $request->price_m;
        $pizza->price_l = $request->price_l;
        if($pizza->save()) {
            return redirect('admin/pizze');
        }
        return "Wystąpił błąd.";
    }

    public function destroy($id)
    {
        $pizza = Pizza::find($id);

        if($pizza->delete()){
            return redirect('admin/pizze');
        } else
            return back();
    }
}
