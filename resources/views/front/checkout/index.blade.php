@extends('layouts.front.master')
@section('title')
    {{__('home.title')}}
@endsection

@section('styles')
<style>
    .StripeElement {
        background-color: white;
        padding: 8px 12px;
        border-radius: 4px;
        border: 1px solid transparent;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
@endsection

@section('content')

<section>
			
	<div class="container">

        <div class="row">
			<div class="col-lg-8 col-md-8 form-submit">
						
	<form action="{{route('front-pricing-checkout-complete')}}" method="POST" id="subscribe-form">
    @csrf
	<div class="form-group">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
				<label for="card-holder-name">Card Holder Name</label>
    			<input id="card-holder-name" class="form-control" type="text">
			</div>
			<input type="hidden" name="plan_id" value="{{$plan->plan_id}}">
			<div class="col-lg-6 col-md-6 col-sm-12">
				<label for="card-holder-name">Amount</label>
    			<input id="number" name="amount" class="form-control" type="number" value="{{$plan->amount}}">
			</div>
        </div>
    </div>

    
    <div class="form-row">
        <label for="card-element">Credit or debit card</label>
        <div id="card-element" class="form-control">
        </div>
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>
    <div class="stripe-errors"></div>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
    </div>
    @endif
    <div class="form-group text-center">
        <button  id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-lg btn-success btn-block">SUBMIT</button>
    </div>
</form>
							
						</div>
						<!-- Sidebar End -->
							
						<div class="col-lg-4 col-md-4">
							
								<div class="booking-short-side">
									<div class="accordion" id="accordionExample">
										<div class="card">
											<div class="card-header" id="bookinDet">
											  <h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#bookinSer" aria-expanded="true" aria-controls="bookinSer">
												  Checkout Detail
												</button>
											  </h2>
											</div>

											<div id="bookinSer" class="collapse show" aria-labelledby="bookinDet" data-parent="#accordionExample">
												<div class="card-body">
                                                <div class="nearby-wrap">
										<div class="neary_section_list">
										
											<div class="neary_section">
												<div class="neary_section_first">
													<h4 class="nearby_place_title">Backage Name:</h4>
												</div>
												<div class="neary_section_last">
													<div class="nearby_place_rate good">{{$plan->name}}</div>
												</div>
											</div>
											
											<div class="neary_section">
												<div class="neary_section_first">
													<h4 class="nearby_place_title">Price:</h4>
												</div>
												<div class="neary_section_last">
													<div class="nearby_place_rate mid">{{$plan->amount}} AED</div>
												</div>
											</div>
											
											<div class="neary_section">
												<div class="neary_section_first">
													<h4 class="nearby_place_title">Duration:</h4>
												</div>
												<div class="neary_section_last">
													<div class="nearby_place_rate high">{{$plan->duration}} Days</div>
												</div>
											</div>
											
										</div>
									</div>
												
												</div>
											</div>
										</div>
										
										<div class="card">
											<div class="card-header" id="extraFeat">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#extraSer" aria-expanded="false" aria-controls="extraSer">
												    Features
												</button>
											  </h2>
											</div>
											<div id="extraSer" class="collapse" aria-labelledby="extraFeat" data-parent="#accordionExample">
												<div class="card-body">
                                                <div class="nearby-wrap">
										<div class="neary_section_list">
										@if($plan->agent_count != 0)
											<div class="neary_section">
												<div class="neary_section_first">
													<h4 class="nearby_place_title">Agent Counts:</h4>
												</div>
												<div class="neary_section_last">
													<div class="nearby_place_rate good">{{$plan->agent_count}}</div>
												</div>
											</div>
										@endif
                                        @if($plan->properties_count != 0)
											<div class="neary_section">
												<div class="neary_section_first">
													<h4 class="nearby_place_title">Properties Counts:</h4>
												</div>
												<div class="neary_section_last">
													<div class="nearby_place_rate mid"></i>{{$plan->properties_count}}</div>
												</div>
											</div>
										@endif
                                        @if($plan->properties_features_count != 0)
											<div class="neary_section">
												<div class="neary_section_first">
													<h4 class="nearby_place_title">Properties Features Counts:</h4>
												</div>
												<div class="neary_section_last">
													<div class="nearby_place_rate high">{{$plan->properties_features_count}}</div>
												</div>
											</div>
                                        @endif
                                        @if($plan->adds_count != 0)
                                            <div class="neary_section">
												<div class="neary_section_first">
													<h4 class="nearby_place_title">Ads:</h4>
												</div>
												<div class="neary_section_last">
													<div class="nearby_place_rate high"></i>{{$plan->adds_count}}</div>
												</div>
											</div>
										@endif
										</div>
									</div>
													<ul class="booking-detail-list">
                                                        @if($plan->agent_count != 0)
														<li>Agent Counts:<span>{{$plan->agent_count}}</span></li>
                                                        @endif
                                                        @if($plan->properties_count != 0)
														<li>Properties Counts:<span>{{$plan->properties_count}}</li>
                                                        @endif
                                                        @if($plan->properties_features_count != 0)
														<li>Properties Features Counts:<span>{{$plan->properties_features_count}}</li>
                                                        @endif
                                                        @if($plan->adds_count != 0)
														<li>Ads:<span>{{$plan->adds_count}}</li>
                                                        @endif
													</ul>
												</div>
											</div>
										  </div>
										  
										  <div class="card">
											<div class="card-header" id="CouponCode">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#couponcd" aria-expanded="false" aria-controls="couponcd">
												  Coupon Code
												</button>
											  </h2>
											</div>
											<div id="couponcd" class="collapse show" aria-labelledby="CouponCode" data-parent="#accordionExample">
												<div class="card-body">
													<div class="form-group">
														<input type="text" class="form-control" placeholder="Code">
														<button type="button" class="btn btn-black black full-width mt-2">Apply</button>
													</div>
												</div>
											</div>
										</div>
										
										<div class="card">
											<div class="card-header" id="PayMents">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#payser" aria-expanded="false" aria-controls="payser">
												  Payment
												</button>
											  </h2>
											</div>
											<div id="payser" class="collapse" aria-labelledby="PayMents" data-parent="#accordionExample">
												<div class="card-body">
													<ul class="booking-detail-list">
														<li>Sub Total<span>$224</span></li>
														<li>Extra Price<span>$70</span></li>
														<li>Tax<span>$20</span></li>
														<li><b>Pay Ammount</b><span>$314</span></li>
													</ul>
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

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    var card = elements.create('card', {hidePostalCode: true,
        style: style});
    card.mount('#card-element');
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    cardButton.addEventListener('click', async (e) => {
		e.preventDefault();
        console.log("attempting");
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: { name: cardHolderName.value }
                }
            }
            );
        if (error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            paymentMethodHandler(setupIntent.payment_method);
        }
    });
    function paymentMethodHandler(payment_method) {
        var form = document.getElementById('subscribe-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', payment_method);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
@endsection