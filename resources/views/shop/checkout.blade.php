@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
{{--                <h1>Checkout</h1>--}}
{{--                <h4>Your Total: ${{$total}}</h4>--}}
                <div class="card">
                    <div class="card-header">Credit Card
                        <h4>Your Total: ${{$total}}</h4></div>
{{--                    <h1>Checkout</h1>--}}
{{--                    <h4>Your Total: ${{$total}}</h4>--}}
                    <div id="charge-error" class="alert alert-danger" {{!Session::has('error')?'hidden' :''}}>
                        {{Session::get('error')}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('checkout')}}" method="post" id="checkout-form">
{{--                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">--}}
                            @csrf

                            <div class="form-group row">
                                <label for="card-number"  class="col-md-4 col-form-label text-md-right">Credit Card Number</label>

{{--                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>--}}

                                <div class="col-md-6">
                                    <input type="number" id="card-numbeer" class="form-control{{ $errors->has('card_number') ? ' is-invalid' : '' }}" name="card_number" required>

                                    {{--                                    <input id="phone" type="number" min="0" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  value="{{ old('phone') }}" required>--}}

                                    @if ($errors->has('card_number'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('card_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="card-name" class="col-md-4 col-form-label text-md-right">Card Holder Name</label>
{{--                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>--}}

                                <div class="col-md-6">
                                    <input type="text" id="card-name" class="form-control{{ $errors->has('card_name') ? ' is-invalid' : '' }}" name="card_name" required>

{{--                                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>--}}

                                    @if ($errors->has('card_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('card_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row">
{{--                                <label for="card-expiry-month">Expiration Month</label>--}}
{{--                                <input type="text" id="card-expiry-month" class="form-control" name="card_expiry_month" required>--}}

                                <label for="card-expiry-month"  class="col-md-4 col-form-label text-md-right">Expiration Month</label>
{{----}}
                                {{--                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>--}}

                                <div class="col-md-6">
                                    <input type="number" id="card-expiry-month" class="form-control{{ $errors->has('card_expiry_month') ? ' is-invalid' : '' }}" name="card_expiry_month" required>

                                    {{--                                    <input id="phone" type="number" min="0" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  value="{{ old('phone') }}" required>--}}

                                    @if ($errors->has('card_expiry_month'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('card_expiry_month') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="card-expiry-year" class="col-md-4 col-form-label text-md-right">Expiration Year</label>
{{--                                <input type="text" id="card-expiry-year" class="form-control" name="card_expiry_year" required>--}}

{{--                                <label for="card-number"  class="col-md-4 col-form-label text-md-right">Credit Card Number</label>--}}

                                {{--                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>--}}

                                <div class="col-md-6">
                                    <input type="number" id="card-expiry-year" class="form-control{{ $errors->has('card_expiry_year') ? ' is-invalid' : '' }}" name="card_expiry_year" required>

                                    {{--                                    <input id="phone" type="number" min="0" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  value="{{ old('phone') }}" required>--}}

                                    @if ($errors->has('card_expiry_year'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('card_expiry_year') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="card-cvc" class="col-md-4 col-form-label text-md-right">CVC</label>
{{--                                <input type="text" id="card-cvc" class="form-control" name="card_cvc" required>--}}

{{--                                <label for="card-number"  class="col-md-4 col-form-label text-md-right">Credit Card Number</label>--}}

                                {{--                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>--}}

                                <div class="col-md-6">
                                    <input type="number" id="card-cvc" class="form-control{{ $errors->has('card_cvc') ? ' is-invalid' : '' }}" name="card_cvc" required>

                                    {{--                                    <input id="phone" type="number" min="0" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone"  value="{{ old('phone') }}" required>--}}

                                    @if ($errors->has('card_cvc'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('card_cvc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>







                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Buy Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection










































{{--@extends('layouts.main')--}}

{{--@section('title')--}}
{{--    Laravel Shopping Cart--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <div class="row">--}}
{{--        <div class="col-sm-6  col-md-4 col-md-offset-4 col-sm-offset-3">--}}
{{--            <h1>Checkout</h1>--}}
{{--            <h4>Your Total: ${{$total}}</h4>--}}
{{--            <div id="charge-error" class="alert alert-danger" {{!Session::has('error')?'hidden' :''}}>--}}
{{--                {{Session::get('error')}}--}}
{{--            </div>--}}
{{--            <form action="{{route('checkout')}}" method="post" id="checkout-form">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xs-12">--}}


{{--                    </div>--}}
{{--                    <div class="col-xs-12">--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="address">Address</label>--}}
{{--                            <input type="text" id="address" class="form-control" name="address" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xs-12">--}}
{{--                        <hr>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="card-name">Card Holder Name</label>--}}
{{--                            <input type="text" id="card-name" class="form-control" name="card_name" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xs-12">--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="card-number">Credit Card Number</label>--}}
{{--                            <input type="text" id="card-numbeer" class="form-control" name="card_number" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xs-12">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-6">--}}

{{--                                <div class="form-group">--}}
{{--                                    <label for="card-expiry-month">Expiration Month</label>--}}
{{--                                    <input type="text" id="card-expiry-month" class="form-control" name="card_expiry_month" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-xs-6">--}}

{{--                                <div class="form-group">--}}
{{--                                    <label for="card-expiry-year">Expiration Year</label>--}}
{{--                                    <input type="text" id="card-expiry-year" class="form-control" name="card_expiry_year" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-xs-12">--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="card-cvc">CVC</label>--}}
{{--                            <input type="text" id="card-cvc" class="form-control" name="card_cvc" required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                {{csrf_field()}}--}}
{{--                <button type="submit" class="btn btn-success">Buy Now</button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@section('scripts')--}}
{{--    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>--}}

{{--    <script type="text/javascript" src="{{URL::to('js/checkout.js')}}"></script>--}}
{{--@endsection--}}