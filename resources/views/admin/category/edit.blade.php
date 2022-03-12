@extends('layouts.admin')

@section('content')

    <div class='card'>
        <div class="card-headr text-center ">
            <h3>Edit/Update Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('#')}}" method="HEAD" enctype="multipart/form-data">
            {{-- <form action="{{ url('update-category'.$category->id) }}" method="HEAD" enctype="multipart/form-data"> --}}
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" value="{{$category->name}}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{$category->slug}}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb3">
                        <label for="">Description</label>
                        <textarea name="description" rows="5" class="form-control">{{$category->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{$category->status == '1' ? 'cheacked' : ''}}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Populer</label>
                        <input type="checkbox" name="populer" {{$category->popular == '1' ? 'cheacked' : ''}}>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{$category->meta_title}}" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="5" class="form-control">{{$category->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_descrip" rows="5" class="form-control">{{$category->meta_descrip}}</textarea>
                    </div>
                    @if ($category->image)
                        <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="Category image">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection