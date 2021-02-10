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
                <div class="row-3">
                    <form role="form" id="comment-form" method="post" action="{{ route('update', $pizza) }}">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group">
                            <label>Nr pizzy</label>
                            <input type="number" name="id" class="form-control" max="100" value="{{$pizza->id}}">
                        </div>
                        <div class="form-group">
                            <label>Nazwa</label>
                            <input class="form-control" name="name" value="{{$pizza->name}}">
                        </div>
                        <div class="form-group">
                            <label>Składniki</label>
                            <input class="form-control" name="ingredients" value="{{$pizza->ingredients}}">
                        </div>
                        <div class="form-group">
                            <label>Cena S</label>
                            <input type="number" step="0.01" name="price_s" class="form-control" value="{{$pizza->price_s}}">
                        </div>
                        <div class="form-group">
                            <label>Cena M</label>
                            <input type="number" step="0.01" name="price_m" class="form-control" value="{{$pizza->price_m}}">
                        </div>
                        <div class="form-group">
                            <label>Cena L</label>
                            <input type="number" step="0.01" name="price_l" class="form-control" value="{{$pizza->price_l}}">
                        </div>
                        <button type="submit" class="btn btn-success">Zapisz</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

