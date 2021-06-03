@extends('layouts.backend.app')
@push('title') Show Product Orders @endpush
@push('style')
    <!-- page css -->
    <link href="{{ asset('assets/backend/dist/css/pages/timeline-vertical-horizontal.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/dist/css/pages/ribbon-page.css') }}" rel="stylesheet">
@endpush
@section('breadcrumb')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Product Orders</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Product Orders</li>
                </ol>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-folder-open"></i>  &nbsp; Back to List </a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Start Contentbar -->
    <div class="contentbar">
        <div class="row">
            <!-- Column -->
            <div class="col-md-9 col-lg-9">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="m-b-0 text-white">Order Items ({{ $order->items->count() }})</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table product-overview">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th style="text-align:center">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->items->groupBy('product_id') as $item_orders)
                                    @foreach($item_orders as $item_order)
                                        <tr>
                                            <td width="150"><img src="{{ asset($item_order->product->image ?? 'uploads/images/no-image.jpg') }}" alt="iMac" width="80"></td>
                                            <td width="550">
                                                <h5 class="font-500 text-danger">{{ $item_order->product->name }}</h5>
                                            </td>
                                            <td>BDT {{ $item_order->product->price }}</td>
                                            <td>{{ $item_orders->count() }}</td>
                                            <td width="150" align="center" class="font-500">BDT {{ $item_order->product->price * $item_orders->count() }}</td>
                                        </tr>
                                        @break
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-dark btn-outline"><i class="fa fa-arrow-left"></i> Back to orders</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-3 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CART SUMMARY</h5>
                        <hr>
                        <small>Total Price</small>
                        <h2>BDT {{ \App\Models\Product::whereIn('id', $order->items->pluck('product_id'))->sum('price') }}</h2>
                        <hr>
                        @if($order->delivered)
                            <button class="btn btn-warning pull-right col-12 cng-order-status-btn"><i class="fa fa fa-shopping-cart"></i> Make Order Un Completed</button>
                        @else
                            <button class="btn btn-danger pull-right col-12 cng-order-status-btn"><i class="fa fa fa-shopping-cart"></i> Make Order Completed</button>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer Info</h5>
                        <hr>
                        <h4><i class="ti-user"></i> {{ $order->user->name }}</h4>
                        <h4><i class="ti-mobile"></i> {{ $order->phone }}</h4>
                        <h4><i class="ti-email"></i> {{ $order->user->email }} </h4>
                        <address><i class="ti-location-pin"></i> {{ $order->address }}</address>
                        <hr>
                        <small>{{ $order->note }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            //Remove to card
            $('.cng-order-status-btn').click(function(){
                var this_btn = $(this);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Order status will be changed!",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'PATCH',
                            url: '{{ route('admin.orders.update', $order) }}',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            processData: false,
                            contentType: false,
                            beforeSend: function (){
                                //this_btn.html('Please wait ---- ');
                                this_btn.prop("disabled",true);
                            },
                            complete: function (){
                                //this_btn.html('Edit now');
                                this_btn.prop("disabled",false);
                            },
                            success: function (data) {
                                if (data.type == 'success'){
                                    Swal.fire({
                                        position: 'top-end',
                                        icon: data.type,
                                        title: data.message,
                                        showConfirmButton: false,
                                        timer: 1500
                                    }); setTimeout(function () {
                                        location.reload();
                                    }, 800);
                                }else{
                                    Swal.fire({
                                        icon: data.type,
                                        title: 'Oops...',
                                        text: data.message,
                                        footer: 'Something went wrong!'
                                    });
                                }
                            },
                            error: function (xhr) {
                                var errorMessage = '<div class="card bg-danger">\n' +
                                    '                        <div class="card-body text-center p-5">\n' +
                                    '                            <span class="text-white">';
                                $.each(xhr.responseJSON.errors, function(key,value) {
                                    errorMessage +=(''+value+'<br>');
                                });
                                errorMessage +='</span>\n' +
                                    '                        </div>\n' +
                                    '                    </div>';
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    footer: errorMessage
                                });
                            },
                        });
                    }
                })
            });
        });
    </script>
@endpush
