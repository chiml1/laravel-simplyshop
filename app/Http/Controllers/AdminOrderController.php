<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $orders = Order::orderBy('id', 'asc')->where('status','niezrealizowano')->get();
        return view('admin.ordersnotrealised', ['orders' => $orders]);
    }
    public function ordersrealised()
    {
        $orders = Order::orderBy('id', 'asc')->where('status','zrealizowano')->get();
        return view('admin.ordersrealised', ['orders' => $orders]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        $order = Order::find($id);
        $orderDetails = $order->orderDetails;
        return view('admin.orderdetail', ['orderDetails' => $orderDetails]);

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = 'zrealizowano';

        if($order->save()) {
            return redirect('admin/orders');
        }
        return "Wystąpił błąd.";
    }

    public function destroy($id)
    {
        //
    }
}
