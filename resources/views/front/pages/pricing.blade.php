@extends('layouts.front.master')
@section('title')
    {{__('home.title')}}
@endsection
@section('content')

<section>
			
				<div class="container">

					@if($errors->any())
						<div class="alert alert-danger" role="alert" style="font-weight: bold;height: 70px;line-height: 40px;">
						{{$errors->first()}}
						</div>
					@endif

			<div class="col-lg-12 col-md-12 col-sm-12 text-center">
							
							<div class="custom-tab style-1">
								<ul class="nav nav-tabs pb-2 b-0" id="myTab" role="tablist" style="display: flex;justify-content: center;">
									<li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Monthly</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Year</a>
									</li>

								</ul>
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
									<div class="row">
									
										@foreach ($plans_monthly as $p_monthly)
											<!-- Single Package -->
										<div class="col-lg-4 col-md-4">
											<div class="pricing-wrap">
												
												<div class="pricing-header">
													<i class="lni-layers"></i>
													<h4 class="pr-title">{{$p_monthly->name}}</h4>
													<span class="pr-subtitle">Start With Basic Package</span>
												</div>
												<div class="pricing-value">
													<h4 class="pr-value">{{$p_monthly->amount}}</h4>
												</div>
												<div class="pricing-body">
													<ul>
														<li>{{'( '.$p_monthly->agent_count .' )'. ' Agents in year'}}</li>
														<li>{{'( '.$p_monthly->properties_count .' )'. ' Properties in year'}}</li>
														<li>{{'( '.$p_monthly->properties_features_count .' )'. ' Features Properties in year'}}</li>
														<li>{{'( '.$p_monthly->adds_count .' )'. ' Ads in year'}}</li>
														<li>Contact With Agent</li>
														<li>7x24 Fully Support</li>
													</ul>
												</div>
												<div class="pricing-bottom">
													<a href="{{route('front-pricing-checkout',$p_monthly->slug)}}" class="btn-pricing">Choose Plan</a>
												</div>
												
											</div>
										</div>
										
										@endforeach
										
										
										
									</div>

									</div>
									<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										<div class="row">

										@foreach ($plans_year as $p_year)
											<!-- Single Package -->
										<div class="col-lg-4 col-md-4">
											<div class="pricing-wrap">
												
												<div class="pricing-header">
													<i class="lni-layers"></i>
													<h4 class="pr-title">{{$p_year->name}}</h4>
													<span class="pr-subtitle">Start With Basic Package</span>
												</div>
												<div class="pricing-value">
													<h4 class="pr-value">{{$p_year->amount}}</h4>
												</div>
												<div class="pricing-body">
													<ul>
														<li>{{'( '.$p_year->agent_count .' )'. ' Agents in year'}}</li>
														<li>{{'( '.$p_year->properties_count .' )'. ' Properties in year'}}</li>
														<li>{{'( '.$p_year->properties_features_count .' )'. ' Features Properties in year'}}</li>
														<li>{{'( '.$p_year->adds_count .' )'. ' Ads in year'}}</li>
														<li>Contact With Agent</li>
														<li>7x24 Fully Support</li>
													</ul>
												</div>
												<div class="pricing-bottom">
													<a href="{{route('front-pricing-checkout',$p_year->slug)}}" class="btn-pricing">Choose Plan</a>
												</div>
												
											</div>
										</div>
										
										@endforeach
										
									
										
									</div>
									</div>
								
							</div>
						</div>



					
				</div>
						
			</section>

@endsection
