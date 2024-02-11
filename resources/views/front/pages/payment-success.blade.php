@extends('layouts.front.master')
@section('title')
    {{__('home.title')}}
@endsection
@section('content')

<section>
			
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 text-center">

				<div class="checkout-wrap">
								
								<div class="checkout-head">
									<div class="success-message">
										<span class="thumb-check"><i class="ti-check"></i></span>
										<h4>Thank You, Your subscribe Confirmed!</h4>
										<p>A confirmation mail send to your email, Check your inbox.</p>
									</div>
								</div>
								
								<div class="checkout-body" style="text-align: left;">
									
									
									<div class="row">
										<div class="col-md-12 col-lg-12">
										
											<ul class="booking-detail-list">
												<li>Booking ID/Num.<span>{{$agency->stripe_id}}</span></li>
												<li>Agency Name<span>{{$agency->name_en}}</span></li>
												<li>Email<span>{{$agency->email}}</span></li>
												<li>Plan<span>{{$subscription->plan->name}}</span></li>
												<li>Price<span>{{$subscription->plan->amount." "."AED"}}</span></li>
												<li>Phone<span>{{$agency->mobile}}</span></li>
												<li>City<span>{{$agency->city_fk->name_en}}</span></li>
												<li>Country<span>{{$agency->country_fk->name}}</span></li>
												<li>Location<span>{{$agency->address}}</span></li>
											</ul>
											<hr>
											
											<h4>Payment Detail</h4>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit</p>
											
										</div>
									</div>
								</div>
								
							</div>			

			</div>
		</div>			

					
	</div>
						
			</section>

@endsection
