@extends('layouts.admin')
@section('title')
    Products
@endsection
@section('content')

    <div class='card'>
        <div class="card-header">
            <h3>Products page</h3>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Selling Price</th>
                        <th>original Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Action</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->original_price}}</td>
                            <td>{{$item->selling_price}}</td>
                            <td>{{$item->qty}}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/products/'.$item->image)}}" class="cat-image" alt="image here">
                            </td>
                            <td>
                                <a href="{{url('edit-Product/'.$item->id)}}"><button class="btn btn-primary btn-sm">Edit</button></a>
                                <a href="{{url('delete-Product/'.$item->id)}}"><button class="btn btn-danger btn-sm">Delete</button></a>
                            </td>
                            {{-- <td>{{$item->category->name}}</td> --}}
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endsection
