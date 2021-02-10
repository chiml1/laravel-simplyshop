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
                <div class="row-12">
                    <h2>Dodaj pizze!</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" method="post" action="{{ route('addpizza') }}" id="comment-form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Nr pizzy</label>
                            <input type="number" name="id" class="form-control" max="100">
                        </div>
                        <div class="form-group{{$errors->has('name')?'has-error':''}}">
                            <label>Nazwa</label>
                            <input class="form-control" name="name">
                        </div>
                        <div class="form-group{{$errors->has('ingredients')?'has-error':''}}">
                            <label>Składniki</label>
                            <input class="form-control" name="ingredients">
                        </div>
                        <div class="form-group{{$errors->has('price_s')?'has-error':''}}">
                            <label>Cena S</label>
                            <input type="number" step="0.01" name="price_s" class="form-control">
                        </div>
                        <div class="form-group{{$errors->has('price_m')?'has-error':''}}">
                            <label>Cena M</label>
                            <input type="number" step="0.01" name="price_m" class="form-control">
                        </div>
                        <div class="form-group{{$errors->has('price_l')?'has-error':''}}">
                            <label>Cena L</label>
                            <input type="number" step="0.01" name="price_l" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Zapisz</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

