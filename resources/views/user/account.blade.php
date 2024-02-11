

@extends('layouts.front.master')
@section('title')
    {{__('user/properties/fav-properties.title')}}
@endsection
@section('content')

<div class="container-fluid" style="margin-top: 50px;margin-bottom: 50px;">
								
					<div class="row">
						
						@include('layouts.front.nav-user')
						

						<div class="col-lg-9 col-md-8">
						<form action="{{route('front-user-account-action')}}" method="POST" enctype="">
						@csrf
							<div class="dashboard-wraper">
							
								<!-- Basic Information -->
								<div class="form-submit">	
									<h6>{{__('user/account.title')}}</h6>
									<div class="submit-section">
										<div class="form-row">
										
											<div class="form-group col-md-6">
												<label>{{__('user/account.name')}}</label>
												<input type="text" name="name" class="form-control" value="{{$user->name}}">
											</div>
											
											<div class="form-group col-md-6">
												<label>{{__('user/account.email')}}</label>
												<input type="email" disabled name="email" class="form-control" value="{{$user->email}}">
											</div>
											
											<div class="form-group col-md-6">
												<label>{{__('user/account.password')}}</label>
												<input type="password" name="password" class="form-control">
											</div>
											
											<div class="form-group col-md-6">
												<label>{{__('user/account.phone')}}</label>
												<input type="number" name="phone" class="form-control" value="{{$user->phone}}">
											</div>
											
										
											
										</div>
									</div>
								</div>
								
								<div class="form-submit">	
									<div class="submit-section">
										<div class="form-row">
										
											
											
											<div class="form-group col-lg-12 col-md-12">
												<button class="btn btn-theme" type="submit">{{__('main.save')}}</button>
											</div>
											
										</div>
									</div>
								</div>
								
							</div>
							</form>
						</div>

						
					</div>
				</div>

@endsection

@section('scripts')



@endsection
