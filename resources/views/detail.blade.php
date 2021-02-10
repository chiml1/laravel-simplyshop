@extends('layouts.app')

@section('content')
    <div class="flex items-center">
        <div class="md:w-1/2 md:mx-auto">

            @if (session('status'))
                <div
                    class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
                    role="alert">
                    {{ session('status') }}
                </div>
            @endif


            <div class="container-fluid">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nr szczegółu</th>
                            <th>Nr zamówienia</th>
                            <th>Nr pizzy</th>
                            <th>Ilość</th>
                            <th>Rozmiar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderDetails as $orderDetail)
                            <tr>
                                <td>{{$orderDetail->id}}</td>
                                <td>{{$orderDetail->order_id}}</td>
                                <td>{{$orderDetail->pizza_id}}</td>
                                <td>{{$orderDetail->quantity}}</td>
                                <td>{{$orderDetail->size}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
