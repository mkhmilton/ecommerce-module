@extends('layouts.frontend.app')
@push('title') Cart @endpush
@section('content')
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                   <div class="billing-details-area">
                        <h2>Billing details</h2>
                        <form action="{{ route('order') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="billing-input">
                                        <label>
                                            Full Name
                                            <span class="required">*</span>
                                        </label>
                                        <input name="name" placeholder="Full name" type="text" required value="{{ auth()->user()->name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="billing-input">
                                        <label>
                                            Email Address
                                            <span class="required">*</span>
                                        </label>
                                        <input name="name" type="email" placeholder="Email" value="{{ auth()->user()->email }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="billing-input">
                                        <label>
                                            Phone
                                            <span class="required">*</span>
                                        </label>
                                        <input name="phone" type="text" placeholder="Phone number" value="{{ old('phone') }}">
                                        @error('phone')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="billing-input">
                                        <label>
                                            Address
                                            <span class="required">*</span>
                                        </label>
                                        <input name="address" placeholder="Street address" type="text" value="{{ old('address') }}">
                                        @error('address')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="billing-input">
                                        <label>
                                            Order Notes
                                            <span class="required">*</span>
                                        </label>
                                        <textarea name="note" id="checkout-mess" placeholder="Notes about your order, e.g. special notes for delivery.">{{ old('note') }}</textarea>
                                        @error('note')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <input type="submit" value="Place order">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="your-order-payment">
                        <div class="your-order">
                            <h2>Your Order</h2>
                            <ul>
                                @foreach(collect(cart_items())->groupBy('id') as $products)
                                    @foreach($products as $product)
                                        <li> {{ $product->name }} ({{ $products->count() }}) <span class="each-price">{{ $product->price * $products->count() }}</span></li>
                                        @break
                                    @endforeach
                                @endforeach
                                <li class="order-total">Order Total <span>{{ collect(cart_items())->sum('price') }}</span></li>
                            </ul>
                        </div>
                        <div class="your-payment">
                            <h2>payment method</h2>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                                        Direct Bank Transfer
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Cheque Payment
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                                                <div class="panel-body">
                                                    <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h4 class="panel-title">
                                                    <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                                        PayPal
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree" aria-expanded="true" style="">
                                                <div class="panel-body">
                                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush

