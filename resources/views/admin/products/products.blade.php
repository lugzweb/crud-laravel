@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Products</div>
            <div class="panel-body">
                <p>Manage products</p>
            </div>

            <!-- Table -->
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->updated_at}}</td>
                    <td><a href="{{route('admin.product.show',['id'=>$product->id])}}">Edit</a> | <a href="{{route('admin.product.delete',['id'=>$product->id])}}">Delete</a></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $products->links() }}
    </div>

@endsection
