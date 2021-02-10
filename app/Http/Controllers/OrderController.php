<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pizzas = Pizza::orderBy('id', 'asc')->get();
        return view('order', ['pizzas' => $pizzas]);
    }

    public function ordersnotrealised()
    {
        $pizzas = Pizza::orderBy('id','asc')->get();
        return view('admin.ordersnotrealised', ['pizzas' => $pizzas]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'firstName' => 'required|min:1|max:50',
            'lastName' => 'required|min:1|max:50',
            'phone' => 'required|regex:/^[0-9]{9}$/',
            'city' => 'required|min:1|max:50',
            'street' => 'required|min:1|max:50',
            'building_nr' => 'required|min:1|max:50',
        ]);

        $order = new Order();
        $order->firstName = $request->firstName;
        $order->lastName = $request->lastName;
        $order->user_id = Auth::user()->id;
        $order->phone = $request->phone;
        $order->city = $request->city;
        $order->street = $request->street;
        $order->building_nr = $request->building_nr;
        $order->flate_nr = $request->flate_nr;
        $order->message = $request->message;
        $order->status = 'niezrealizowano';

        $price = 0;
        if (!is_null($request->amount1) && !is_null($request->pizza_nr1)) {
            switch ($request->size1) {
                case 's':
                    $pricePizza1 = Pizza::find($request->pizza_nr1)->price_s;
                    $price = $pricePizza1 * $request->amount1;
                    break;
                case 'm':
                    $pricePizza1 = Pizza::find($request->pizza_nr1)->price_m;
                    $price = $pricePizza1 * $request->amount1;
                    break;
                case 'l':
                    $pricePizza1 = Pizza::find($request->pizza_nr1)->price_l;
                    $price = $pricePizza1 * $request->amount1;
                    break;
            }
        }

        if (!is_null($request->amount2) && !is_null($request->pizza_nr2)) {
            switch ($request->size2) {
                case 's':
                    $pricePizza2 = Pizza::find($request->pizza_nr2)->price_s;
                    $price += $pricePizza2 * $request->amount2;
                    break;
                case 'm':
                    $pricePizza2 = Pizza::find($request->pizza_nr2)->price_m;
                    $price += $pricePizza2 * $request->amount2;
                    break;
                case 'l':
                    $pricePizza2 = Pizza::find($request->pizza_nr2)->price_l;
                    $price += $pricePizza2 * $request->amount2;
                    break;
            }
        }
        if (!is_null($request->amount3) && !is_null($request->pizza_nr3)) {
            switch ($request->size3) {
                case 's':
                    $pricePizza3 = Pizza::find($request->pizza_nr3)->price_s;
                    $price += $pricePizza3 * $request->amount3;
                    break;
                case 'm':
                    $pricePizza3 = Pizza::find($request->pizza_nr3)->price_m;
                    $price += $pricePizza3 * $request->amount3;
                    break;
                case 'l':
                    $pricePizza3 = Pizza::find($request->pizza_nr3)->price_l;
                    $price += $pricePizza3 * $request->amount3;
                    break;
            }
        }
        if (!is_null($request->amount4) && !is_null($request->pizza_nr4)) {
            switch ($request->size4) {
                case 's':
                    $pricePizza4 = Pizza::find($request->pizza_nr4)->price_s;
                    $price += $pricePizza4 * $request->amount4;
                    break;
                case 'm':
                    $pricePizza4 = Pizza::find($request->pizza_nr4)->price_m;
                    $price += $pricePizza4 * $request->amount4;
                    break;
                case 'l':
                    $pricePizza4 = Pizza::find($request->pizza_nr4)->price_l;
                    $price += $pricePizza4 * $request->amount4;
                    break;
            }
        }
        if (!is_null($request->amount5) && !is_null($request->pizza_nr5)) {
            switch ($request->size5) {
                case 's':
                    $pricePizza5 = Pizza::find($request->pizza_nr5)->price_s;
                    $price += $pricePizza5 * $request->amount5;
                    break;
                case 'm':
                    $pricePizza5 = Pizza::find($request->pizza_nr5)->price_m;
                    $price += $pricePizza5 * $request->amount5;
                    break;
                case 'l':
                    $pricePizza5 = Pizza::find($request->pizza_nr5)->price_l;
                    $price += $pricePizza5 * $request->amount5;
                    break;
            }
        }
        $order->price = $price;
        if ($order->save()) {
            $orderIdJson = Order::select('id')->where('firstName', $request->firstName)->orderByDesc('id')->take(1)->get();
            $orderIdArray = json_decode($orderIdJson);

            foreach ($orderIdArray as $val) {
                $orderId = $val->id;
            }
            $order_detail1 = new OrderDetail();
            $order_detail1->order_id = $orderId;
            $order_detail1->pizza_id = $request->pizza_nr1;
            $order_detail1->quantity = $request->amount1;
            $order_detail1->size = $request->size1;
            $order_detail1->save();

            if (!is_null($request->amount2) && !is_null($request->pizza_nr2)) {
                $order_detail2 = new OrderDetail();
                $order_detail2->order_id = $orderId;
                $order_detail2->pizza_id = $request->pizza_nr2;
                $order_detail2->quantity = $request->amount2;
                $order_detail2->size = $request->size2;
                $order_detail2->save();
            }
            if (!is_null($request->amount3) && !is_null($request->pizza_nr3)) {
                $order_detail3 = new OrderDetail();
                $order_detail3->order_id = $orderId;
                $order_detail3->pizza_id = $request->pizza_nr3;
                $order_detail3->quantity = $request->amount3;
                $order_detail3->size = $request->size3;
                $order_detail3->save();
            }
            if (!is_null($request->amount4) && !is_null($request->pizza_nr4)) {
                $order_detail4 = new OrderDetail();
                $order_detail4->order_id = $orderId;
                $order_detail4->pizza_id = $request->pizza_nr4;
                $order_detail4->quantity = $request->amount4;
                $order_detail4->size = $request->size4;
                $order_detail4->save();
            }
            if (!is_null($request->amount5) && !is_null($request->pizza_nr5)) {
                $order_detail5 = new OrderDetail();
                $order_detail5->order_id = $orderId;
                $order_detail5->pizza_id = $request->pizza_nr5;
                $order_detail5->quantity = $request->amount5;
                $order_detail5->size = $request->size5;
                $order_detail5->save();
            }
            return redirect('myorders');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
