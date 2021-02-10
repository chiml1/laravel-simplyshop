<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }

    public function index()
    {
        $currentUserId = Auth::user()->id;
        $currentUser = User::find($currentUserId);

        $myOrders = $currentUser->orders;
        return view('myorders', ['myOrders' => $myOrders]);
    }

    public
    function create()
    {
        //
    }

    public
    function store(Request $request)
    {
        //
    }

    public
    function show($id)
    {
        $order = Order::find($id);
        $orderDetails = $order->orderDetails;
        return view('detail', ['orderDetails' => $orderDetails]);
    }

    public
    function edit($id)
    {
        //
    }

    public
    function update(Request $request, $id)
    {
        //
    }

    public
    function destroy($id)
    {
        //
    }
}
