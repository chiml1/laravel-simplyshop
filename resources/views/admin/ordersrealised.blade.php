@extends('admin.index')

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
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->firstName}}</td>
                                <td>{{$order->lastName}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->city}}</td>
                                <td>{{$order->street}}</td>
                                <td>{{$order->building_nr}}</td>
                                <td>{{$order->flat_nr}}</td>
                                <td>{{$order->message}}</td>
                                <td>{{$order->price}}</td>
                                <td><form role="form" action="{{ route('orderdetail',$order->id) }}" method="get" id="comment-form" enctype="multipart/form-data">{{ csrf_field() }}<button class="btn btn-info" type="submit" >Szczegóły</button></form></td>
                                <td>{{$order->status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
