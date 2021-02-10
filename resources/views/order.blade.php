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
                            <th>#</th>
                            <th>Nazwa</th>
                            <th>Składniki</th>
                            <th>Cena_S</th>
                            <th>Cena_M</th>
                            <th>Cena_L</th>
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
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-10">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h1>Zamów pizze!</h1>
                        <form role="form" action="{{ route('orderpizza') }}" method="post" id="comment-form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row{{$errors->has('firstName')?'has-error':''}}"><label class="col-sm-2 col-form-label">Imię*:</label><div class="col-sm-10"><input name="firstName" class="form-control"  pattern="^([A-ZĆŁŹŻŚ][a-ząęćółśźż]{1,25})$" required></div></div>
                            <div class="form-group row{{$errors->has('lastName')?'has-error':''}}"><label class="col-sm-2 col-form-label">Nazwisko*:</label><div class="col-sm-10"><input name="lastName" class="form-control"  pattern="^([A-ZĆŁŹŻŚ][a-ząęćółśźż]{1,40})$" required></div></div>
                            <div class="form-group row{{$errors->has('phone')?'has-error':''}}"><label class="col-sm-2 col-form-label">Nr telefonu*:</label><div class="col-sm-10"><input name="phone" class="form-control" type="tel"  placeholder="444555333" pattern="[0-9]{9}"  required></div></div>
                            <div class="form-group row{{$errors->has('city')?'has-error':''}}"><label class="col-sm-2 col-form-label">Miasto*:</label><div class="col-sm-10"><input name="city" class="form-control"  pattern="^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$" required></div></div>
                            <div class="form-group row{{$errors->has('street')?'has-error':''}}"><label class="col-sm-2 col-form-label">Ulica*:</label><div class="col-sm-10"><input name="street" class="form-control" pattern="^([A-ZŁ][a-ząęćółśźż]{1,25})$" required></div></div>
                            <div class="form-group row{{$errors->has('building_nr')?'has-error':''}}"><label class="col-sm-2 col-form-label">Nr budynku*:</label><div class="col-sm-10"><input name="building_nr" class="form-control" pattern="^([A-Za-z0-9]{1,5})$" required></div></div>
                            <div class="form-group row"><label class="col-sm-2 col-form-label">Nr mieszkania:</label><div class="col-sm-10"><input name=flat_nr" class="form-control"pattern="^([A-Za-z0-9]{1,5})$"></div></div>
                            <div class="form-group">
                                <label>Wiadomość:</label>
                                <textarea class="form-control" name=message" rows="3" value="" rows="5"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Nr pizzy</label>
                                    <input type="number" class="form-control" name="pizza_nr1" min="1" max="40" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Rozmiar</label>
                                    <select name="size1" class="form-control" required>
                                        <option value="s">s</option>
                                        <option value="m">m</option>
                                        <option value="l">l</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Ilość</label>
                                    <input type="number" class="form-control" name="amount1" min="1" max="5" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" name="pizza_nr2" min="1" max="40">
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="size2" class="form-control">
                                        <option value="s">s</option>
                                        <option value="m">m</option>
                                        <option value="l">l</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" name="amount2" min="1" max="5">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" name="pizza_nr3" min="1" max="40">
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="size3" class="form-control">
                                        <option value="s">s</option>
                                        <option value="m">m</option>
                                        <option value="l">l</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" name="amount3" min="1" max="5">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" name="pizza_nr4" min="1" max="40">
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="size4" class="form-control">
                                        <option value="s">s</option>
                                        <option value="m">m</option>
                                        <option value="l">l</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" name="amount4" min="1" max="5">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" name="pizza_nr5" min="1" max="40">
                                </div>
                                <div class="form-group col-md-4">
                                    <select name="size5" class="form-control">
                                        <option value="s">s</option>
                                        <option value="m">m</option>
                                        <option value="l">l</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="number" class="form-control" name="amount5" min="1" max="5">
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Zamów</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                    <div class="col-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
