@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="py-3-mb-4 shadow-sm bg-warning border-top">
        <div class="container"  style="padding: 5px">
            <h5 class="mb-0"><a href="{{ url('/') }}">Home</a> /
                <a href="{{ url('checkout/')}}">Checkout</a>
            </h5>
        </div>
    </div>
    <div class="container mt-5">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Baic Details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">First Name</label>
                                <input type="text" class="form-control firstname" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter Your First Name">
                                <span id="fname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control last name" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Your Last Name">
                                <span id="lname_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="text" class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Your Email">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Your Phone Number">
                                <span id="phone_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Address 1</label>
                                <input type="text" class="form-control address" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Enter Your Address">
                                <span id="address1_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Address 2</label>
                                <input type="text" class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Your second Address">
                                <span id="address2_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">City</label>
                                <input type="text" class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="Enter Your City">
                                <span id="city_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">State</label>
                                <input type="text" class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="Enter Your State">
                                <span id="state_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Country</label>
                                <input type="text" class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Your Country">
                                <span id="country_error" class="text-danger"></span>
                            </div>
                            <div class="col-md-6">
                                <label for="">Pin code</label>
                                <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Your Pincode">
                                <span id="pincode_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 container">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        @if ($cartitems->count() > 0)
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cartitems as $item)

                                    <tr>
                                        <td>{{ $item->products->name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>{{ $item->products->selling_price }}</td>
                                        <td>{{ $total = $item->products->selling_price * $item->prod_qty }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>

                            <input type="hidden" class="payment_mode" value="COD">
                            <button type="submit" class="btn btn-success w-100">Place Order | COD</button>
                            <button type="button" class="btn btn-primary razorpay_btn w-100 mt-2">Pay with Rozerpay</button>
                            <div id="paypal-button-container"></div>

                        @else
                        <div class="container my-2">
                            <div class="card-bady text-center">
                                <h2> you <i class="fa fa-shopping-cart"></i>Cart is Empty</h2>
                                <a href="{{ url('category')}}" class="btn btn-primary float-end">Continue Shopping</a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection


@section('scripts')
<script src="https://www.paypal.com/sdk/js?client-id=AWGhnt5T3QZP0AJEhVN1JkiERTKSJm1rcX7b6fDdQFCRK3OjXx8mgG2mJX1OdPmizQQpG4LFGiQujQ0K"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    paypal.Buttons({
        createOrder: function(data, actions){
            return actions.order.create({
                purchase_units:[{
                    amount: {
                        value: '0'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details){
                // alert('Transaction completed by' + details.payer.name.give_name);

                            var firstname = $('.firstname').val();
                            var lastname = $('.lastname').val();
                            var email = $('.email').val();
                            var phone = $('.phone').val();
                            var address1 = $('.address1').val();
                            var address2 = $('.address2').val();
                            var city = $('.city').val();
                            var state = $('.state').val();
                            var country = $('.country').val();
                            var pincode = $('.pincode').val();

                        q   $.ajax({
                                method: "POST",
                                url: "/palce-order",
                                data: {
                                    'fname': firstname,
                                    'lname': lastname,
                                    'email': email,
                                    'phone': phone,
                                    'address1': address1,
                                    'address2': address2,
                                    'city': city,
                                    'state': state,
                                    'country': country,
                                    'total_price': total_price,
                                    'pincode': pincode,
                                    'payment_mode': 'paid by Paypal',
                                    'payment_id': details_id
                                },

                                success: function(response) {
                                    swal(response.status);
                                    .then((value) => {
                                            window.location.href = "/my-orders";
                                        });
                                    window.location.href = "/my-orders";
                                }
            });
        }
    });render('#paypal-botten-container');
</script>

@endsection
