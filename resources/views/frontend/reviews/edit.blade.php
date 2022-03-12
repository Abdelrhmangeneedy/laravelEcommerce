
@extends('layouts.front')

@section('title', "edit your Review")

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">


                        <h5>You are Writing a Review For {{ $review->product->name }}</h5>
                        <form action="/update-review" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" class="review_id" value="{{ $review_id }}">
                            <textarea name="user_id" rows="5" class="form-control" placeholder="Write Your Review">{{ $review->user_review }}</textarea>
                            <button class="btn btn-primary" type="submit"> update Review</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
