@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="/">
                <div class="col-md-6">
                    <div class="input-group search">
                        <input autofocus type="text" name="query" value="{{isset($_GET['query']) ? $_GET['query'] : null}}" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">Search</button>
                      </span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sel1">Order:</label>
                        <select class="form-control" name="order" id="sel1">
                            <option value="ASC">ASC</option>
                            <option value="DESC">DESC</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <div class="row">
            @if($products)
                @foreach($products as $product)
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h4 class="list-group-item-heading">{{$product->title}}</h4>
                            <p class="list-group-item-text">{{$product->price}} <span class="badge">$</span></p>
                        </li>
                    </ul>
                @endforeach

        </div>
        <div class="row">
            {!! $products->appends(\Illuminate\Support\Facades\Input::except('page'))->render() !!}
        </div>
        @else
            <div class="row">
                NO RESULTS, NIGGA
            </div>
        @endif
    </div>

@endsection
