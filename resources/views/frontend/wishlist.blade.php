@extends('layouts.front')

@section('title')
    My Wishlist
@endsection
@section('content')
    <div class="py-3-mb-4 shadow-sm bg-warning border-top">
        <div class="container"  style="padding: 5px">
            <h5 class="mb-0"><a href="{{ url('/') }}">Home</a> /
                <a href="{{ url('wishlist/')}}">Wishlist</a>
            </h5>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow wishlistitem">
            <div class="col-body">
                @if ($wishlist->count() > 0)
                <div class="card-body">
                    @foreach ($wishlist as $item)
                    <div class="row product_data">
                        <div class="col-md-2">
                            <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" height="70px" width="70px" alt="Image here">
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>{{ $item->products->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6> Rs {{ $item->products->selling_price }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <input type="hidden" name="" class="prod_id" value="{{ $item->prod_id }}">
                            @if ($item->products->qty >= $item->prod_qty)
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3" style="width: 130px;">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="qunatity" class="form-control qty-input text-center" value="1">
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                @else
                                    <h6>Sorry This Product Is-: <s>Out Of Stock</s></h6>
                            @endif
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-success addToCartBtn"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger remove-wishlist-item"><i class="fa fa-trash"></i> Remove</button>
                        </div>
                    </div>
                    @endforeach
                </div>

                @else
                    <h3>There are No Products IN Your Wishlist</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
