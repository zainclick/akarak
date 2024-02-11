@extends('layouts.front.master')
@section('title')
    {{__('home.title')}}
@endsection
@section('content')

		<!-- ============================ Hero Banner  Start================================== -->
			<div class="image-cover hero-banner" style="background: #f3f3f3;margin-top: -60px;">
				<div class="container">
                <form method="POST" action="{{route('agency-register-action')}}" >
                @csrf
				
                    <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12"></div>
                    <div class="col-lg-6 col-md-4 col-sm-12">
                    	<div style="direction: ltr;" class="hero-search-wrap">
						<div class="hero-search text-center">	
							<h4>Submit <span class="theme-cl">your</span> Details</h4>
						</div>
						<div class="hero-search-content">
							
							<div class="row">

								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<div class="input-with-icon">
											<input id="name" type="text" name="name" class="form-control" placeholder="Company Name">
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<div class="input-with-icon">
											<input id="email" type="email" name="email" class="form-control" placeholder="Email" autocomplete="off">
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<div class="input-with-icon">
											<input id="phone" type="text" name="phone" class="form-control" placeholder="Phone" autocomplete="off">
										</div>
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<div class="input-with-icon">
											<input id="password" type="password" name="password" class="form-control" placeholder="Password">
										</div>
									</div>
								</div>
								
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<div class="input-with-icon">
											<select id="cities" class="form-control">
												<option value="">&nbsp;</option>
												@foreach ($citys as $city)

													<option value="{{$city->id}}">{{$city->name_en}}</option>

												@endforeach
											
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
								</div>	
							


							</div>
							
					
						</div>
						<div class="hero-search-action">
							<input class="btn search-btn" type="submit" value="تسجيل الدخول">
						</div>


					</div>
                    </div>
				</div>

				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->


@endsection
