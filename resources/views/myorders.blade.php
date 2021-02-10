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
                            <th>Nr zamówienia</th>
                            <th>Data i godzina</th>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Nr telefonu</th>
                            <th>Miasto</th>
                            <th>Ulica</th>
                            <th>Nr budynku</th>
                            <th>Nr mieszkania</th>
                            <th>Wiadomość</th>
                            <th>Cena</th>
                            <th>Szczegóły</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($myOrders as $myOrder)
                            <tr>
                                <td>{{$myOrder->id}}</td>
                                <td>{{$myOrder->created_at}}</td>
                                <td>{{$myOrder->firstName}}</td>
                                <td>{{$myOrder->lastName}}</td>
                                <td>{{$myOrder->phone}}</td>
                                <td>{{$myOrder->city}}</td>
                                <td>{{$myOrder->street}}</td>
                                <td>{{$myOrder->building_nr}}</td>
                                <td>{{$myOrder->flat_nr}}</td>
                                <td>{{$myOrder->message}}</td>
                                <td>{{$myOrder->price}}</td>
                                <td><form role="form" action="{{ route('myordersid',$myOrder->id) }}" method="get" id="comment-form" enctype="multipart/form-data">{{ csrf_field() }}<button class="btn btn-info" type="submit" name="submit" value="{{$myOrder->id}}">Szczegóły</button></form></td>
                                <td>{{$myOrder->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
