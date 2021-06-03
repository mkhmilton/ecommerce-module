@extends('layouts.backend.app')
@push('title') Edit Product @endpush
@push('style')

@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Product</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
                <a href="{{ route('admin.products.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-folder-open"></i>  &nbsp; Back to List </a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <div class="card m-b-30 col-12 ">
                <div class="card-header bg-danger">
                    <h5 class="card-title text-white">Edit</h5>
                </div>
                <div class="card-body">
                    <form class="row justify-content-center" method="POST" action="{{ route('admin.products.update', $product) }}"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="col-lg-10">
                            <div class="form-group row">
                                <div class="col-lg-6 col-xl-6 mb-2">
                                    <label for="name" class="col-sm-4 col-form-label">Product name</label>
                                    <input name="name" type="text" class="form-control" id="name" value="{{ $product->name }}" required>
                                    @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-xl-6 mb-2">
                                    <label for="price" class="col-sm-4 col-form-label">Product price</label>
                                    <input name="price" type="text" class="form-control" id="price" value="{{ $product->price }}" required>
                                    @error('price')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-xl-6 mb-2">
                                    <label for="quantity" class="col-sm-4 col-form-label">Product quantity</label>
                                    <input name="quantity" type="text" class="form-control" id="quantity" value="{{ $product->quantity }}" required>
                                    @error('quantity')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-xl-6 mb-2">
                                    <label for="image" class="col-sm-4 col-form-label">Product image</label>
                                    <img class="rounded-circle" style="max-width: 100px" src="{{ asset($product->image ?? 'uploads/images/no-image.jpg') }}">
                                    <input name="image" type="file" class="form-control" id="image" value="">
                                    @error('image')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn waves-effect waves-light btn-lg btn-primary"> Update Product </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush
