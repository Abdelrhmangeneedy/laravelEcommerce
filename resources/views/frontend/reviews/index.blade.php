@extends('layouts.front')

@section('title', "Write a Review")

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($verified_purchase count() > 0)

                        <h5>You are Writing a Review For {{ $product->name }}</h5>
                        <form action="/add-review" method="POST">
                            @csrf
                            <input type="hidden" class="product_id" value="{{ $product_id }}">
                            <textarea name="user_review" rows="5" class="form-control" placeholder="Write Your Review"></textarea>
                            <button class="btn btn-primary" type="submit"> Submit Review</button>
                        </form>
                    @else

                    <div class="alart alart-danger">
                        <h5>You Are not Eligiable to Review This Product</h5>
                        <p>For The Trusthworthines of The Reviews, only Customers who Pruchased The Product can Write  a Review about The Product .</p>
                        <a href="{{ url('/') }} " class="btn btn-primary">Go to home Page</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
