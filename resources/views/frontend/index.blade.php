@extends('layouts.front')

@section('title','Welcom To Zd-Shop')
@section('content')
@include('layouts.inc.slider')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Products</h1>
                <div class="row">
                    @foreach ($featured_products as $prod)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="products image">
                            <div class="card-body">
                                <h5>{{ $prod->name }}</h5>
                                <span class="float-start">{{ $prod->selling_price }}</span>
                                <span class="float-end"><s>{{ $prod->original_price }}</s></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Trending Category</h1>
                <div class="row">
                    @foreach ($trending_category as $tcategory)
                    <div class="col-md-3 mb-3">
                        <a href="{{ url('view-category/'.$tcategory->slug) }}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/category/'.$tcategory->image) }}"
                                    alt="Category image">
                                <div class="card-body">
                                    <h5>{{ $tcategory->name }}</h5>
                                    <p>{{ $tcategory->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h2>Featured Products</h2>
    <div class="row py-5">

        <div class="owl-carousel owl-theme">
            @foreach ($featured_products as $prod)
            <div class="item">
                <div class="card">
                    <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="Product image">
                    <div class="card-body">
                        <h5>{{ $prod->name }}</h5>
                        <span class="float-start">{{ $prod->selling_price }}</span>
                        <span class="float-end"><s>{{ $prod->original_price }}</s></span>
                    </div>
                </div>
            </div>
            @endforeach
          </div>

    </div>
</div>

@if($trending_category )
<div class="container">
    <div class="row py-5">
        <h2>trending_category</h2>
        <div class="owl-carousel owl-theme">
            @foreach ($trending_category as $tcategory)
            <div class="item">
                <div class="card">
                    <img src="{{ asset('assets/uploads/category/'.$tcategory->image) }}" alt="Product image">
                    <div class="card-body">
                        <h5>{{ $tcategory->name }}</h5>
                        <p>{{ $tcategory->desciption }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

@endsection


@push('scripts')
<script>
    // $('.featured-carousal').owlCarousel({
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:true,
            loop:false
        }
    }
})

</script>
@endpush
