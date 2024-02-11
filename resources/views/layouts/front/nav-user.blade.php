						<div class="col-lg-3 col-md-4">
							<div id="accordion" class="accordion">
								<div class="card mb-0">
									<a class="card-header collapsed" href="{{route('front-user-account')}}">
										<span class="card-title">{{__('user/menue_right.personal_information')}}</span>
									</a>
							
									<a class="card-header collapsed" href="#collapseTwo">
										<span class="card-title">{{__('user/menue_right.contacted_properties').' () '}}</span>
									</a>
							
									<a class="card-header collapsed" href="{{route('front-user-fav-properties')}}">
										<span class="card-title">{{__('user/menue_right.fav_properties').' ('.$properties->count().')'}}</span>
									</a>

									<a class="card-header collapsed" href="#collapseThree">
										<span class="card-title">{{__('user/menue_right.saved_searches').' () '}}</span>
									</a>

									<a class="card-header collapsed" href="#collapseThree">
										<span class="card-title">{{__('user/menue_right.log_out')}}</span>
									</a>
								
								</div>
							</div>
						</div>