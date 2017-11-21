@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form method="POST" action="{{route('admin.product.store')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" required value="" class="form-control" id="title">
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" name="price" required class="form-control" value=""  id="price">
                </div>
                <button type="submit" class="btn btn-default">Create</button>
            </form>
        </div>
    </div>
@endsection