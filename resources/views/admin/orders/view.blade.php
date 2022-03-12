@extends('layouts.admin')

@section('title')
    My Orders
@endsection
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white">Order View
                        <a href="{{ url('orders') }}" class="btn btn-warning text-white float-right">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-details">
                            <h4>Shopping Details</h4>
                            <hr>
                            <label for="">First Name</label>
                            <div class="border">{{ $orders->fname }}</div>
                            <label for="">Last Name</label>
                            <div class="border">{{ $orders->lname }}</div>
                            <label for="">Email</label>
                            <div class="border">{{ $orders->email }}</div>
                            <label for="">Contact Us</label>
                            <div class="border">{{ $orders->phone }}</div>
                            <label for="">Shopping Address</label>
                            <div class="border">
                                {{ $orders->address1 }} / <br>
                                {{ $orders->address2 }} / <br>
                                {{ $orders->city }} / <br>
                                {{ $orders->state }} /
                                {{ $orders->country }} /
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{ $orders->pincode }}</div>
                        </div>
                        <div class="col-md-6">

                            <h4>Order Details</h4>
                            <hr>
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quntity</th>
                                        <th>Price</th>
                                        <th>Toral Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->qty}}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $total_price = $item->price*$item->qty }}</td>
                                            <td><img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" width="50px" alt="product image"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Grand Total -: <span class="float-end">{{ $total_price }}</span></h4>
                            <div class="mt-5 px-2">
                                <label for="">Order Status</label>
                                <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="order_status" class="form-select">
                                        <option {{ $orders->status == '0'? 'selected':'' }} value="0">Pending</option>
                                        <option {{ $orders->status == '1'? 'selected':'' }} value="1">Completed</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary float-end mt-3">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
