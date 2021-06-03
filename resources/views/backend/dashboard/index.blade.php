@extends('layouts.backend.app')
@push('title') Dashboard @endpush
@push('style')
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('assets/backend/dist/css/pages/dashboard1.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/dist/css/pages/icon-page.css') }}" rel="stylesheet">
@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Admin Dashboard</h4>
        </div>
    </div>
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-primary">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-primary">{{ $data['admin']  }}</h3>
                            <h5 class="text-muted m-b-0">Admin</h5></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-primary">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-primary">{{ $data['customer']  }}</h3>
                            <h5 class="text-muted m-b-0">Customer</h5></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-primary">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-primary">{{ $data['order']  }}</h3>
                            <h5 class="text-muted m-b-0">Order</h5></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-primary">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-primary">{{ $data['delivered_order']  }}</h3>
                            <h5 class="text-muted m-b-0">Completed order</h5></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-primary">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-primary">{{ $data['un_delivered_order']  }}</h3>
                            <h5 class="text-muted m-b-0">Incomplete order</h5></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-primary">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-primary">{{ $data['product']  }}</h3>
                            <h5 class="text-muted m-b-0">Product</h5></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-primary">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-primary">{{ $data['product_type']  }}</h3>
                            <h5 class="text-muted m-b-0">Product type</h5></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-primary">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-primary">{{ $data['company']  }}</h3>
                            <h5 class="text-muted m-b-0">Company</h5></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-primary">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-primary">{{ $data['sell_amount']  }}</h3>
                            <h5 class="text-muted m-b-0">Sell amount</h5></div>
                    </div>
                </div>
            </div>

            <!-- Column -->
        </div>
            <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush
