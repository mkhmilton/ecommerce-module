@extends('layouts.frontend.app')
@push('title') Index @endpush
@section('content')
    <div class="portfolio-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center mb-50">
                <h2>Products <i class="fa fa-shopping-cart"></i></h2>
            </div>
            <div class="row portfolio-style-2">
                <div class="grid">
                    @foreach($products as $product)
                        <div class="col-md-3 col-sm-6 col-xs-12 mb-30">
                            <div class="single-shop">
                                <div class="shop-img">
                                    <a href="javascript:0"><img src="{{ asset($product->image ?? 'uploads/images/no-image.jpg') }}"
                                                     alt=""/></a>
                                    <div class="shop-quick-view">
                                        <a href="#" data-toggle="modal" data-target="#quick-view"
                                           title="Quick View">
                                            <i class="pe-7s-look"></i>
                                        </a>
                                    </div>
                                    <div class="price-up-down">
                                        <span class="sale-new">
                                            &nbsp;
                                            {{ $loop->iteration }}
                                        </span>
                                    </div>
                                    <div class="button-group">
                                        <button class="add-to-cart" id="add-to-cart-btn-{{ $product->id }}" value="{{ $product->id }}" title="Add to Cart">
                                            <i class="pe-7s-cart"></i> &nbsp;
                                            Add to cart <b class="in-btn-counter">{{ collect(cart_items())->where('id', $product->id)->count() ?? 0 }}</b>
                                        </button>
                                    </div>
                                </div>
                                <div class="shop-text-all">
                                    <div class="title-color fix">
                                        <div class="shop-title f-left">
                                            <h3><a href="javascript:0">{{ $product->name }}</a></h3>
                                        </div>
                                        <span class="price f-right">
                                                    <span class="new">{{ $product->price }}</span>
                                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            //add to card
            $('.add-to-cart').click(function(){
                var formData = new FormData();
                var this_btn = $(this);
                formData.append('product', $(this).val())
                $.ajax({
                    method: 'POST',
                    url: '{{ route('addToCart') }}',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function (){
                        this_btn.prop("disabled",true);
                    },
                    complete: function (){
                        this_btn.prop("disabled",false);
                    },
                    success: function (data) {
                        if (data.type == 'success'){
                            var this_btn_counter =  this_btn.find('.in-btn-counter').text() ?? 0;
                            this_btn.find('.in-btn-counter').text(parseInt(this_btn_counter)+parseInt(1));

                            $('.cart-counter').html(data.cart.length)
                            console.log(data.cart)
                            Swal.fire({
                                position: 'top-end',
                                icon: data.type,
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }else{
                            Swal.fire({
                                icon: data.type,
                                title: 'Oops...',
                                text: data.message,
                                footer: ''
                            });
                            if(data.url){
                                setTimeout(function() {
                                    location.replace(data.url);
                                }, 2000);//
                            }
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
            });

        });
    </script>
@endpush

