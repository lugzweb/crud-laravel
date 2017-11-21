@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form method="POST" action="{{route('admin.product.update',['id'=>$product->id])}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" value="{{$product->title}}" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name="price" class="form-control" value="{{$product->price}}"  id="price">
                </div>
                <button type="submit" class="btn btn-default">Update</button>
            </form>
        </div>
    </div>
@endsection