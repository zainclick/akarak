@extends('layouts.front.master')
@section('title')
    {{__('home.title')}}
@endsection
@section('content')

			<!-- ============================ Agency Name Start================================== -->
			<div class="agency-page" style="">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="agency agency-list shadow-0 mb-2 mt-2" style="background: transparent;">
							
								<a class="agency-avatar" style="flex: 1;height: 272px;background-color: #fff;border-radius: 5px;-webkit-box-shadow: 0 5px 30px rgba(0,22,84,0.1);">
									<img src="{{$agency->main_image()}}" alt="">
								</a>
								
								<div class="agency-content">
								<div class="row">
								<div class="col-lg-6 col-md-12">
									<div class="agency-name">
										<h4 style="color: #fff;"><a><?php if(app()->getLocale() == 'ar'){echo $agency->name_ar;}else{echo $agency->name_en;} ?></a></h4>
										<span style="color: #fff;"><i class="lni-map-marker"></i>{{$agency->address}}</span>
										<p style="color: #fff;"><span style="color: #fff;">Agent: </span>{{" ".$agency->agent_fk->count()}}</p>
										<p style="color: #fff;"><span style="color: #fff;">Properties: </span>{{" ".$agency->properties_fk->count()}}</p>

									
									</div>
									
									
									
										<div class="clearfix"></div>
									</div>
									
								<div class="col-lg-6 col-md-12">
									<div class="agent-widget" style="margin-right: 10px;">
									<p>CONTACT THIS BROKER</p>
									<div class="agent-contact-btn">
											<button class="btn btn-theme full-width" style="width: 100%;margin-bottom: 10px;height: 50px;"><i class="lni-phone-handset"></i><span>{{__('main.call')}}</span></button>

											<button class="btn btn-theme full-width" style="width: 100%;height: 50px;background: #616162;border: 1px solid #616162;" data-toggle="modal" data-target="#email-agent"><i class="fa fa-envelope"></i><span>{{__('main.email')}}</span></button>

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
			<!-- ============================ Agency Name ================================== -->
			
			<!-- ============================ About Agency ================================== -->
			<section class="gray">
				<div class="container">
					<div class="row">
					
						<!-- property main detail -->
						<div class="col-lg-12 col-md-12 col-sm-12">
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header ags">
									<h4 class="block-title">{{__('front/agencies/show.agency_info')}}</h4>
								</div>
								
								<div class="block-body">
									<ul class="dw-proprty-info">
										<li><strong>{{__('front/agencies/show.ceo')}}</strong>Mr. ZAIN</li>
										<li><strong>{{__('front/agencies/show.email')}}</strong>{{$agency->email}}</li>
										<li><strong>{{__('front/agencies/show.phone')}}</strong>{{$agency->mobile}}</li>
										<li><strong>{{__('front/agencies/show.whatsapp')}}</strong>{{$agency->whatsapp}}</li>
										<li><strong>{{__('front/agencies/show.address')}}</strong>{{$agency->address}}</li>
										<li><strong>{{__('front/agencies/show.city')}}</strong>Dubai</li>
										<li><strong>{{__('front/agencies/show.country')}}</strong>United State</li>
										<li><strong>{{__('front/agencies/show.stab')}}</strong>{{$agency->stab}}</li>
									</ul>
								</div>
								
							</div>
							
								<!-- row Start -->
					<div class="row">
					
						<div class="col-lg-8 col-md-12 col-sm-12">
							
							<div class="custom-tab style-1">
								<ul class="nav nav-tabs pb-2 b-0" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{__('front/agencies/show.prop_for_rent')}}</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{__('front/agencies/show.prop_for_sale')}}</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">{{__('front/agencies/show.agents')}}</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent" style="margin-top: 25px;">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
									
										<!-- row -->
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 list-layout">
													
													@foreach ($props_rents as $p_rent)
													<?php 
														$img = App\Models\Backend\PropertiesImages::where('property',$p_rent->id)->first();
														?>
														<!-- Single Listings -->
													<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="{{route('front-properties-show',$p_rent->slug)}}">
																<img src="/images/properties/{{$img->image}}" class="img-fluid mx-auto" alt="">
															</a>
															<div class="listing-like-top">
																<i class="ti-heart"></i>
															</div>
															<div class="listing-rating">
																<i class="ti-star filled"></i>
																<i class="ti-star filled"></i>
																<i class="ti-star filled"></i>
																<i class="ti-star filled"></i>
																<i class="ti-star"></i>
															</div>
															<span class="property-type"><?php if($p_rent->property_status == 1){echo __('front/properties/index.rent');}else{echo __('front/properties/index.sale');} ?></span>
															<span class="true-check">TrueCheck<i class="list-status ti-check"></i></span>
														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="{{route('front-properties-show',$p_rent->slug)}}"><?php if(app()->getLocale() == 'ar'){echo substr($p_rent->title_ar,0,65);}else{echo substr($p_rent->title_en,0,65);} ?></a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>{{$p_rent->address}}</span>
																</div>
																<div class="list-author">
																	<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-bed"></span><strong>{{__('front/city/index.bed')}}:</strong>{{$p_rent->bedrooms}}</li>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-bath"></span><strong>{{__('front/city/index.bath')}}:</strong>{{$p_rent->bathrooms}}</li>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-area"></span><strong>{{__('front/city/index.sqft')}}:</strong>{{$p_rent->sqft}}</li>
																</ul>
															</div>
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<span class="list-pr" style="color:#fd5332;font-weight: bold;">{{$p_rent->price}} / </span><small style="color:#fd5332;font-weight: bold;">{{__('front/city/index.aed')}}</small>
																</div>

															<div class="listing-contact-info">
																<ul class="social-icons">
																<li><a class="facebook" href="#"><i class="lni-phone-handset"></i>{{__('front/properties/index.call')}}</a></li>
																<li><a class="twitter" href="#"><i class="fa fa-envelope"></i>{{__('front/properties/index.email')}}</a></li>
																</ul>
															</div>

																<div class="listing-detail-btn">
																	<a href="{{route('front-properties-show',$p_rent->slug)}}" class="more-btn">{{__('front/city/index.more_info')}}</a>
																</div>
															</div>
															
														</div>
														
													</div>
													<!-- End Single Listings -->
													@endforeach
													
													
												
									
												</div>

											</div>
											<!-- // row -->
													<!-- Pagination -->
										<div class="row">
											<div class="col-12 p-3">
												{{$props_rents->appends(request()->query())->render()}}
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
											<!-- row -->
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 list-layout">
													
											
												
													@foreach ($props_sales as $p_sale)
													<?php 
														$img = App\Models\Backend\PropertiesImages::where('property',$p_sale->id)->first();
														?>
														<!-- Single Listings -->
													<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="{{route('front-properties-show',$p_sale->slug)}}">
																<img src="/images/properties/{{$img->image}}" class="img-fluid mx-auto" alt="">
															</a>
															<div class="listing-like-top">
																<i class="ti-heart"></i>
															</div>
															<div class="listing-rating">
																<i class="ti-star filled"></i>
																<i class="ti-star filled"></i>
																<i class="ti-star filled"></i>
																<i class="ti-star filled"></i>
																<i class="ti-star"></i>
															</div>
															<span class="property-type"><?php if($p_sale->property_status == 1){echo __('front/city/index.rent');}else{echo __('front/city/index.sale');} ?></span>
															<span class="true-check">TrueCheck<i class="list-status ti-check"></i></span>
														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="{{route('front-properties-show',$p_sale->slug)}}"><?php if(app()->getLocale() == 'ar'){echo substr($p_sale->title_ar,0,65);}else{echo substr($p_sale->title_en,0,65);} ?></a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>{{$p_sale->address}}</span>
																</div>
																<div class="list-author">
																	<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-bed"></span><strong>{{__('front/city/index.bed')}}:</strong>{{$p_sale->bedrooms}}</li>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-bath"></span><strong>{{__('front/city/index.bath')}}:</strong>{{$p_sale->bathrooms}}</li>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-area"></span><strong>{{__('front/city/index.sqft')}}:</strong>{{$p_sale->sqft}}</li>
																</ul>
															</div>
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<span class="list-pr" style="color:#fd5332;font-weight: bold;">{{$p_sale->price}} / </span><small style="color:#fd5332;font-weight: bold;">{{__('front/city/index.aed')}}</small>
																</div>

															<div class="listing-contact-info">
																<ul class="social-icons">
																<li><a class="facebook" href="#"><i class="lni-phone-handset"></i>{{__('front/city/index.call')}}</a></li>
																<li><a class="twitter" href="#"><i class="fa fa-envelope"></i>{{__('front/city/index.email')}}</a></li>
																</ul>
															</div>

																<div class="listing-detail-btn">
																	<a href="{{route('front-properties-show',$p_sale->slug)}}" class="more-btn">{{__('front/city/index.more_info')}}</a>
																</div>
															</div>
															
														</div>
														
													</div>
													<!-- End Single Listings -->
													@endforeach
									
												</div>
											</div>
											<!-- // row -->
													<!-- Pagination -->
										<div class="row">
											<div class="col-12 p-3">
												{{$props_sales->appends(request()->query())->render()}}
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
									<div class="row put-search-agent">
						
									@foreach ($agents as $agent)
									<?php 
										$rent = App\Models\Backend\Properties::where(['agent'=>$agent->id,'property_status' => 1,'activity_status'=>0])->get();
										$sale = App\Models\Backend\Properties::where(['agent'=>$agent->id,'property_status' => 2,'activity_status'=>0])->get();

									?>
									<div class="col-lg-12 col-md-12">

										<!-- Single Agency -->
										<div class="agency agency-list">
										
											<a href="{{route('front-agents-show',$agent->slug)}}" class="agency-avatar" style="flex: 2;height: 100%;">
												<img src="{{$agent->main_image()}}" alt="">
											</a>
											
											<div class="agency-content">
												<div class="agency-name">
													<h4><a href="{{route('front-agents-show',$agent->slug)}}"><?php if(app()->getLocale() == 'ar'){echo substr($agent->name_ar,0,20);}else{echo substr($agent->name_en,0,20);} ?></a></h4>
													<span><i class="lni-map-marker"></i>{{substr($agent->address,0,20);}}</span>
												</div>

												<a class="a-agency" href="{{route('front-agencies-show',$agent->agency_fk->slug)}}">
													<img src="{{$agent->agency_fk->main_image()}}" class="d-inline-block">
												</a>

												<ul class="agency-detail-info">
													<li><i class="lni-phone-handset"></i>{{$agent->mobile}}</li>
												</ul>
												<div class="listing-features-info" style="margin-top: -25px;">
													<ul style="margin-top: 26px;">
														<li class="listing-card-info-icon"><strong>Languages:</strong>
														@foreach ($agent->language_fk as $language)
															<span>{{$language->language_fk->name_en}} | </span>
														@endforeach
														</li>
													</ul>
												</div>
												
											<div class="listing-features-info" >
												<ul >
													<li class="listing-card-info-icon"><strong>For Rent:</strong>{{$rent->count()}}</li>
													<li class="listing-card-info-icon"><strong>For Sale:</strong>{{$sale->count()}}</li>
												</ul>
											</div>
											
											<div class="listing-footer-wrapper" style="background-color: #f7f7f7">
																
															<div class="listing-contact-info" style="width: 100%;">
																<ul class="social-icons" style="<?php if(app()->getLocale() == 'ar'){echo 'text-align: left;';}else{echo 'text-align: right;';} ?>">
																<li><a class="facebook" href="#" style="width: 100px;text-align: center;line-height: 30px;"><i class="lni-phone-handset" style="<?php if(app()->getLocale() == 'ar'){echo 'margin-left: 5px;';}else{echo 'margin-right: 5px;';} ?>"></i>Call</a></li>
																<li><a class="twitter" href="#" style="width: 100px;text-align: center;line-height: 30px;"><i class="fa fa-envelope" style="<?php if(app()->getLocale() == 'ar'){echo 'margin-left: 5px;';}else{echo 'margin-right: 5px;';} ?>"></i>Email</a></li>
																</ul>
															</div>
															
											</div>
												<div class="clearfix"></div>
											</div>
											
										</div>
									</div>

									@endforeach
						
				
						
									</div>

									</div>
								</div>
							</div>
						</div>

						<!-- property Sidebar -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="page-sidebar" style="margin-top: 46px;">
								
							<!-- Featured Property -->
								<div class="sidebar-widgets" >
									@if($props_features->count() > 0) 
									<h4 style="font-size: 17px;margin-left: 15px;">{{__('front/agencies/show.features_properties')}}</h4>
									
									<div class="sidebar_featured_property">

										@foreach ($props_features as $prop_feature)
										<?php 
											$img = App\Models\Backend\PropertiesImages::where('property',$prop_feature->property)->first();
										?>
											<!-- List Sibar Property -->
										<div class="sides_list_property">
											<div class="sides_list_property_thumb">
												<a href="{{route('front-properties-show',$prop_feature->property_fk->slug)}}">
												<img src="/images/properties/{{$img->image}}" class="img-fluid" alt="">
												</a>
											</div>
											<div class="sides_list_property_detail">
												<h4><a href="{{route('front-properties-show',$prop_feature->property_fk->slug)}}"><?php if(app()->getLocale() == 'ar'){echo substr($prop_feature->property_fk->title_ar,0,25);}else{echo substr($prop_feature->property_fk->title_en,0,25);} ?></a></h4>
												<span><i class="ti-location-pin"></i><?php if(app()->getLocale() == 'ar'){echo $prop_feature->property_fk->city_fk->name_ar;}else{echo $prop_feature->property_fk->city_fk->name_en;} ?></span>
												<div class="lists_property_price">
													<div class="lists_property_types">
														<div class="property_types_vlix sale"><?php if($prop_feature->property_fk->property_status == 1){echo __('front/properties/index.rent');}else{echo __('front/properties/index.sale');} ?></div>
													</div>
													<div class="lists_property_price_value">
														<h4>{{$prop_feature->property_fk->price}}</h4>
													</div>
												</div>
											</div>
										</div>
										@endforeach
										
									
										
									</div>
									@endif
									
								</div>
								
							</div>

							<!-- add widdget -->
								
								
							</div>
						</div>
						
							<!-- Pagination -->
							<div class="row">
								<div class="col-12 p-3">
									{{$agents->appends(request()->query())->render()}}
								</div>
							</div>
					</div>
					<!-- /row -->
							
						</div>
						
						
					
					</div>					
				</div>	
			</section>
			<!-- ============================ About Agency End ================================== -->

@endsection

@section('model')

			<!-- Email agency In Modal -->
						
			<div class="modal fade" id="email-agent" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="registermodal">
						<span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
						<div class="modal-body">
							<span class="modal-header-title" style="display: inline-block;padding-bottom: 10px;margin-left: -15px;font-weight: bold;">{{__('main.email_agent')}}</span>
							<div class="login-form">
                			<form method="POST" action="{{route('front-user-email-agency')}}" >
								@csrf
									
					<div class="row">

					<div class="col-lg-12 col-md-12" style="margin-left: -15px;">

							<!-- Single Agency -->
							<div class="agency agency-list" style="height: 145px;border-radius: 0;margin-bottom: 20px;width: 106%;">
							
								<a style="height: 145px;flex: 2;" class="agency-avatar" style="flex: 2;">
									<img src="{{$agency->main_image()}}" alt="">
								</a>
								
								<div class="agency-content">
									<div class="agency-name">
										<h4><a><?php if(app()->getLocale() == 'ar'){echo $agency->name_ar;}else{echo $agency->name_en;} ?></a></h4>
									</div>

									<ul class="agency-detail-info">
										<li style="margin-left: 0px;margin-bottom: 0px;">ORN#: {{$agency->orn}}</li>
										<li style="margin-left: 0px;margin-bottom: 0px;">Address: {{$agency->address}}</li>

									</ul>
								
									<div class="clearfix"></div>
								</div>
								
							</div>
						</div>
									
						<div class="col-lg-12 col-md-12 col-md-12 list-layout">
							<div class="row put-search-filter">
							
									
								<div class="form-submit">	
									<div class="submit-section">
										<div class="form-row" style="margin-right: -15px;margin-left: -15px;">

											<div class="form-group col-md-12">
												<textarea class="form-control" required name="msg" placeholder="{{__('main.msg')}}" style="height: 80px;"></textarea>											
											</div>
										
											<div class="form-group col-md-6">
												<input type="text" name="name" required class="form-control" placeholder="{{__('main.name')}}" value="<?php if(auth('front-user')->check()){echo auth('front-user')->user()->name;} ?>">
											</div>
											
											<div class="form-group col-md-6">
												<input type="email" name="email" required class="form-control" placeholder="{{__('main.email')}}" value="<?php if(auth('front-user')->check()){echo auth('front-user')->user()->email;} ?>">
											</div>

											<input type="hidden" name="agency" required value="{{$agency->id}}">

											<div class="form-group col-md-12">
											      <input class="form-control" type="tel" id="txtPhone" name="phone" value="<?php if(auth('front-user')->check()){echo auth('front-user')->user()->phone;} ?>" class="txtbox" />
											</div>
											
										</div>
									</div>
								</div>		
								
							</div>
					
						</div>


						
					</div>
								<div class="form-group">
									<button type="submit" class="btn btn-theme">{{__('main.send')}}</button>
								</div>

								</form>
							</div>
							
							
						</div>
					</div>
				</div>
			</div>
			
			<!-- End email agency Modal -->

@endsection

@section('scripts')
<script>
$(function() {
  $("#country").change(function() {
    let countryCode = $(this).find('option:selected').data('country-code');
    let value = "+" + $(this).val();
    $('#txtPhone').val(value).intlTelInput("setCountry", countryCode);
  });
  
  var code = "+971";
  $('#txtPhone').val(code).intlTelInput();
});
</script>
@endsection
