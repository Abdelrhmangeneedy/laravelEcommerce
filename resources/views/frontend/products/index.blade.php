@extends('layouts.front')

@section('title')
{{ $category->name }}
@endsection
@section('content')

<div class="py-3-mb-4-shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0" style="padding: 5px">Collection / {{ $category->name }}</h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <h1>{{ $category->name }}</h1>
                    @foreach ($products as $prod)
                         <div class="col-md-3 mb-3">
                             <a href="{{ url('category/'.$category->slug.'/'.$prod->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/products/'.$prod->image) }}" alt="products image">
                                    <div class="card-body">
                                        <h5>{{ $prod->name }}</h5>
                                        <span class="float-start">{{ $prod->selling_price }}</span>
                                        <span class="float-end"><s>{{ $prod->original_price }}</s></span>
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

@endsection





{{-- <div class="py-5">
    <div class="container">
        <div class="row">
            <h2>trending_category</h2>
                <div class="owl-carousal featured-carousal owl-theme">
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
    </div>
</div>

@endsection
@section('scriprts')
<script>
    $('.featured-carousal').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
</script>
@endsection --}}
