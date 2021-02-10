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
                <h1>Lista pizz</h1>
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Nr pizzy</th>
                            <th>Nazwa</th>
                            <th>Składniki</th>
                            <th>Cena S</th>
                            <th>Cena M</th>
                            <th>Cena L</th>
                            <th>Edytuj</th>
                            <th>Usuń</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pizzas as $pizza)
                            <tr>
                                <td>{{$pizza->id}}</td>
                                <td>{{$pizza->name}}</td>
                                <td>{{$pizza->ingredients}}</td>
                                <td>{{$pizza->price_s}}</td>
                                <td>{{$pizza->price_m}}</td>
                                <td>{{$pizza->price_l}}</td>
                                <td><a href="{{ route('editpizza', $pizza) }}" class="btn btn-secondary" title="Edytuj">Edytuj</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('delete', $pizza->id) }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" onclick="return confirm('Jesteś pewien?')"
                                                class="btn btn-danger" title="Skasuj">Usuń
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
