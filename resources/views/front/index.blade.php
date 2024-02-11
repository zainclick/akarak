@extends('layouts.front.master')
@section('title')
    {{__('home.title')}}
@endsection
@section('content')

			<!-- ============================ Hero Banner  Start================================== -->
			<div class="image-cover hero-banner" style="background:url(front/assets/img/new-banner-1.jpg) no-repeat;" data-overlay="6">
				<div class="container" style="margin-top: -160px;">
					
					<h1 class="big-header-capt mb-0"><span>{{__('home.land_first_title')}}</span>{{__('home.land_second_title')}}</h1>
					<p class="text-center mb-5">{{__('home.land_third_title')}}</p>
					<<form action="{{route('front-properties-search-index')}}" method="GET" style="margin-top: -50px;">
					<!-- Type -->
					<div class="property-search-type">
						<label class="active"><input class="first-tab" name="property_status" checked="checked" type="radio" value="all">{{__('home.anystatus')}}</label>
						<label><input name="property_status" type="radio" value="sale">{{__('home.sale')}}</label>
						<label><input name="property_status" type="radio" value="rent">{{__('home.rent')}}</label>
						<div class="property-search-type-arrow"></div>
					</div>
					<div class="full-search-2 eclip-search italian-search hero-search-radius">
						<div class="hero-search-content">
							
							<div class="row">
							
														
								<div class="col-lg-3 col-md-3 col-sm-12 small-padd">
									<div class="form-group">
										<div class="input-with-icon">
											<select id="ptypes" name="type" class="form-control">
											<option value="">&nbsp;</option>
											@foreach ($types as $types)
												<option value="{{$types->id}}"><?php if(app()->getLocale() == 'ar'){echo $types->name_ar;}else{echo $types->name_en;} ?></option>
											@endforeach
												
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
								</div>

								
								<div class="col-lg-2 col-md-3 col-sm-12 small-padd">
									<div class="form-group">
										<div class="input-with-icon b-l b-r">
											<select id="cities" name="city" class="form-control">
												<option value="">&nbsp;</option>
											@foreach ($citys as $city)
												<option value="{{$city->id}}"><?php if(app()->getLocale() == 'ar'){echo $city->name_ar;}else{echo $city->name_en;} ?></option>
											@endforeach
											</select>
											<i class="ti-location-pin"></i>
										</div>
									</div>
								</div>

								<div class="col-lg-2 col-md-2 col-sm-6">
									<div class="form-group">
										<div class="input-with-icon">
											<input id="min" type="text" class="form-control" name="min" placeholder="Minimum">
											<i class="ti-money"></i>
										</div>
									</div>
								</div>
								
								<div class="col-lg-2 col-md-2 col-sm-6">
									<div class="form-group">
										<div class="input-with-icon">
											<input id="max" type="text" class="form-control" name="max" placeholder="Maximum">
											<i class="ti-money"></i>
										</div>
									</div>
								</div>
								
								<div class="col-lg-1 col-md-1 col-sm-12 small-padd">
									<div class="form-group">
										<a role="button" class="collapsed ad-search" data-toggle="collapse" href="#advance-search" aria-expanded="false" aria-controls="advance-search"><i class="ti-align-center"></i></a>
									</div>
								</div>
								
								<div class="col-lg-2 col-md-2 col-sm-12 small-padd">
									<div class="form-group">
										<input type="submit" class="btn search-btn" value="{{__('home.search')}}">
									</div>
								</div>
								
							</div>
							<div class="collapse" id="advance-search" aria-expanded="false" role="banner">
							
								<!-- row -->
								<div class="row">
								
									
									<div class="col-lg-6 col-md-4 col-sm-12">
										<div class="form-group">
											<div class="input-with-icon">
												<select id="bedrooms" name="bedrooms" class="form-control">
												<option value="">&nbsp;</option>
												<option <?php if(old('bedrooms') == 1){echo 'selected';} ?> value="1">1</option>
												<option <?php if(old('bedrooms') == 2){echo 'selected';} ?> value="2">2</option>
												<option <?php if(old('bedrooms') == 3){echo 'selected';} ?> value="3">3</option>
												<option <?php if(old('bedrooms') == 4){echo 'selected';} ?> value="4">4</option>
												<option <?php if(old('bedrooms') == 5){echo 'selected';} ?> value="5">5</option>
												<option <?php if(old('bedrooms') == 6){echo 'selected';} ?> value="6">6</option>
												<option <?php if(old('bedrooms') == 7){echo 'selected';} ?> value="7">7</option>
												<option <?php if(old('bedrooms') == 8){echo 'selected';} ?> value="8">8</option>
												</select>
												<i class="fas fa-bed"></i>
											</div>
										</div>
									</div>
									
									<div class="col-lg-6 col-md-4 col-sm-12">
										<div class="form-group">
											<div class="input-with-icon">
												<select id="bathrooms" name="bathrooms" class="form-control">
													<option value="">&nbsp;</option>
													<option <?php if(old('bathrooms') == 1){echo 'selected';} ?> value="1">1</option>
													<option <?php if(old('bathrooms') == 2){echo 'selected';} ?> value="2">2</option>
													<option <?php if(old('bathrooms') == 3){echo 'selected';} ?> value="3">3</option>
													<option <?php if(old('bathrooms') == 4){echo 'selected';} ?> value="4">4</option>
													<option <?php if(old('bathrooms') == 5){echo 'selected';} ?> value="5">5</option>
													<option <?php if(old('bathrooms') == 6){echo 'selected';} ?> value="6">6</option>
													<option <?php if(old('bathrooms') == 7){echo 'selected';} ?> value="7">7</option>
													<option <?php if(old('bathrooms') == 8){echo 'selected';} ?> value="8">8</option>
												</select>
												<i class="fas fa-bath"></i>
											</div>
										</div>
									</div>
									
								</div>
								<!-- /row -->
								
								<!-- row -->
								<div class="row">
								
									<div class="col-lg-12 col-md-12 col-sm-12 mt-5">
										<h4 class="text-dark">{{__('front/properties/index.features')}}</h4>
										<ul class="no-ul-list third-row">
											@foreach ($features as $feature)
											<li>
												<input id="{{$feature->id}}" value="{{$feature->id}}" class="checkbox-custom" name="features[]" type="checkbox">
												<label for="{{$feature->id}}"  class="checkbox-custom-label"><?php if(app()->getLocale() == 'ar'){echo $feature->name_ar;}else{echo $feature->name_en;} ?></label>
											</li>
										@endforeach
										</ul>
									</div>
									
								</div>
								<!-- /row -->
								
							</div>
							
						</div>
					</div>
					</form>
				</div>
			
			</div>
			<!-- ============================ Hero Banner End ================================== -->

            <!-- ============================ Latest Property For features Start ================================== -->
			<section class="gray">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center mb-3">
								<h2>{{__('home.featured_properties_title')}}</h2>
								<p>{{__('home.featured_properties_second')}}</p>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<?php 
								
							if($prop_feaures->count() > 0){?>
							<div class="property-slide">
								
							
								@foreach ($prop_feaures as $prop)
								<!-- Single Property -->
								<div class="single-items">
									<div class="property_item classical-list">
										<div class="listing-img-wrapper" style="position: relative;">
											<div class="list-img-slide">
												<div class="click">
												@foreach ($prop->property_fk->property_imgs_fk as $img)

													<div><a href="{{route('front-properties-show',$prop->property_fk->slug)}}"><img src="/images/properties/{{$img->image}}" class="img-fluid mx-auto" alt="" /></a></div>

												@endforeach
												</div>
											</div>
											<span class="tag_t"><?php if(app()->getLocale() == 'ar'){echo $prop->property_fk->status_fk->name_ar;}else{echo $prop->property_fk->status_fk->name_en;} ?></span>
										</div>
										<div class="proerty_content">
											<div class="proerty_text">
											  <h3 class="captlize"><a href="{{route('front-properties-show',$prop->property_fk->slug)}}"><?php if(app()->getLocale() == 'ar'){echo substr($prop->property_fk->title_ar,0,25);}else{echo substr($prop->property_fk->title_en,0,25);} ?></a></h3>
											  <p class="proerty_price">{{$prop->property_fk->price}}</p>
											</div>
											<p class="property_add">{{$prop->property_fk->address}}</p>
											<div class="property_meta"> 
											  <div class="list-fx-features">
													<div class="listing-card-info-icon">
														<span class="inc-fleat inc-bed">{{$prop->property_fk->bedrooms ." ". __('home.beds')}}</span>
													</div>
													<div class="listing-card-info-icon">
														<span class="inc-fleat inc-type"><?php if(app()->getLocale() == 'ar'){echo $prop->property_fk->type_fk->name_ar;}else{echo $prop->property_fk->type_fk->name_en;} ?></span>
													</div>
													<div class="listing-card-info-icon">
														<span class="inc-fleat inc-area">{{$prop->property_fk->sqft}} sqft</span>
													</div>
													<div class="listing-card-info-icon">
														<span class="inc-fleat inc-bath">{{$prop->property_fk->bathrooms ." ". __('home.bath')}}</span>
													</div>
												</div>  
											</div>
											<div class="property_links">
												<a href="single-property-3.html" class="btn btn-theme">{{__('home.contact_company')}}</a>
												<a href="{{route('front-properties-show',$prop->property_fk->slug)}}" class="btn btn-theme-light">{{__('home.property_details')}}</a>
											</div>
										</div>
									</div>
								</div>

								@endforeach
								
								
							</div>
							<?php }else{ ?>
								<div style="text-align: center">
									<img src="/front/assets/img/house-moving-illustration.svg"  alt="" />

								</div>
								<?php }
								
								?>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ============================ Latest Property For features End ================================== -->


			<!-- ============================ Latest Property For Sale Start ================================== -->
			<section>
				<div class="container">
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>{{__('home.sale_properties_title')}}</h2>
								<p>{{__('home.sale_properties_second')}}</p>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
						<?php 
						if($properties_sales->count() > 0){ ?>
							<div class="property-slide">
								
								@foreach ($properties_sales as $p_sales)
								<!-- Start Single Property -->
								<div class="single-items">
									<div class="property-listing property-2">
								
										<div class="listing-img-wrapper">
											<div class="list-img-slide">
												<div class="click">
											@foreach ($p_sales->property_imgs_fk as $img)

												<div><a href="{{route('front-properties-show',$p_sales->slug)}}"><img src="/images/properties/{{$img->image}}" class="img-fluid mx-auto" alt="" /></a></div>

											@endforeach
												</div>
											</div>
											<span class="property-type"><?php if(app()->getLocale() == 'ar'){echo $p_sales->status_fk->name_ar;}else{echo $p_sales->status_fk->name_en;} ?></span>
										</div>
										
										<div class="listing-detail-wrapper pb-0">
											<div class="listing-short-detail">
												<h4 class="listing-name"><a href="{{route('front-properties-show',$p_sales->slug)}}"><?php if(app()->getLocale() == 'ar'){echo substr($p_sales->title_ar,0,35);}else{ echo substr($p_sales->title_en,0,35);} ?></a><i class="list-status ti-check"></i></h4>
											</div>
										</div>
										
										<div class="price-features-wrapper">
											<div class="listing-price-fx">
												<h6 class="listing-card-info-price price-prefix">{{$p_sales->price}}<span class="price-suffix"><?php if($p_sales->rent_type){if($p_sales->rent_type == 'monthly'){echo '/'. __('home.monthly');}else{echo '/'. __('home.year');}} ?></span></h6>
											</div>
											<div class="list-fx-features">
												<div class="listing-card-info-icon">
													<span class="inc-fleat inc-bed">{{$p_sales->bedrooms}} Beds</span>
												</div>
												<div class="listing-card-info-icon">
													<span class="inc-fleat inc-bath">{{$p_sales->bathrooms}} Bath</span>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								<!-- End Single Property -->	
								@endforeach

							
								
								
							</div>
						<?php }else{ ?>
							<div style="text-align: center">
									<img src="/front/assets/img/house-moving-illustration.svg"  alt="" />

								</div>
						<?php }
						?>
							
						</div>
					</div>
					
				</div>
			</section>
			<!-- ============================ Latest Property For Sale End ================================== -->


			<!-- ============================ Latest Property For Rent Start ================================== -->
			<section class="gray">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>{{__('home.rent_properties_title')}}</h2>
								<p>{{__('home.rent_properties_second')}}</p>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
						<?php 
						if($properties_rents->count() > 0){ ?>
								<div class="property-slide">
								
							@foreach ($properties_rents as $p_rents)
								<!-- Start Single Property -->
								<div class="single-items">
									<div class="property-listing property-2">
								
										<div class="listing-img-wrapper">
											<div class="list-img-slide">
												<div class="click">
											@foreach ($p_rents->property_imgs_fk as $img)

												<div><a href="{{route('front-properties-show',$p_rents->slug)}}"><img src="/images/properties/{{$img->image}}" class="img-fluid mx-auto" alt="" /></a></div>

											@endforeach
												</div>
											</div>
											<span class="property-type"><?php if(app()->getLocale() == 'ar'){echo $p_rents->status_fk->name_ar;}else{echo $p_rents->status_fk->name_en;} ?></span>
										</div>
										
										<div class="listing-detail-wrapper pb-0">
											<div class="listing-short-detail">
												<h4 class="listing-name"><a href="{{route('front-properties-show',$p_rents->slug)}}"><?php if(app()->getLocale() == 'ar'){echo substr($p_rents->title_ar,0,35);}else{echo substr($p_rents->title_en,0,35);} ?></a><i class="list-status ti-check"></i></h4>
											</div>
										</div>
										
										<div class="price-features-wrapper">
											<div class="listing-price-fx">
												<h6 class="listing-card-info-price price-prefix">{{$p_rents->price}}<span class="price-suffix"><?php if($p_rents->rent_type){if($p_rents->rent_type == 'monthly'){echo '/'. __('home.monthly');}else{echo '/'. __('home.year');}} ?></span></h6>
											</div>
											<div class="list-fx-features">
												<div class="listing-card-info-icon">
													<span class="inc-fleat inc-bed">{{$p_rents->bedrooms}} Beds</span>
												</div>
												<div class="listing-card-info-icon">
													<span class="inc-fleat inc-bath">{{$p_rents->bathrooms}} Bath</span>
												</div>
											</div>
										</div>
										
									</div>
								</div>
								<!-- End Single Property -->	
								@endforeach
								
							</div>
						<?php }else{ ?>
								<div style="text-align: center">
										<img src="/front/assets/img/house-moving-illustration.svg"  alt="" />

								</div>
						<?php }
						?>
						
						</div>
					</div>
					
				</div>
			</section>
			<!-- ============================ Latest Property For Rent End ================================== -->


			<!-- ============================ Property Location Start ================================== -->
			<section>
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>{{__('home.location_properties_title')}}</h2>
								<p>{{__('home.location_properties_second')}}</p>
							</div>
						</div>
					</div>
					
					<div class="row">
						
						<!-- Single Location Listing -->
						@foreach ($citys as $city)

						<div class="col-lg-3 col-md-3 col-sm-6">
							<div class="location-listing">
								<div class="location-listing-thumb">
									<a href="{{route('front-properties-citys',$city->slug)}}"><img src="{{$city->main_image()}}" class="img-fluid" alt="" /></a>
								</div>
								<div class="location-listing-caption">
									<h4><a href="{{route('front-properties-citys',$city->slug)}}"><?php if(app()->getLocale() == 'ar'){echo $city->name_ar;}else{echo $city->name_en;} ?></a></h4>
									<span class="theme-cl">{{$city->property_fk->count()}} Property</span>
								</div>
							</div>
						</div>	

						@endforeach

						
					</div>
				</div>
			</section>
			<!-- ============================ Property Location End ================================== -->
			
			<!-- ============================ Agent Start ================================== -->

			<!-- ============================ Agent End ================================== -->

			<section>
				<div class="container">
					
					<div class="row">






						<div class="col-lg-12 col-md-12">
							<div class="sec-heading center">
								<h2>{{__('home.features_agents')}}</h2>
								<p>{{__('home.find_new')}}</p>
							</div>
						</div>
					</div>
					
					<div class="row">
						
						@foreach ($agents_feaures as $agent)


						<!-- Single Agent -->
						<div class="col-lg-4 col-md-6 col-sm-12">
							<div class="agents-grid">
								
								<div class="jb-bookmark"><a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Bookmark"><i class="ti-bookmark"></i></a></div>
								<div class="agent-call"><a href="#"><i class="lni-phone-handset"></i></a></div>
								<div class="agents-grid-wrap">
									
									<div class="fr-grid-thumb">
										<a href="{{route('front-agents-show',$agent->agent_fk->slug)}}">
											<div class="overall-rate">4.4</div>
											<img src="{{$agent->agent_fk->main_image()}}" class="img-fluid mx-auto" alt="">
										</a>
									</div>
									<div class="fr-grid-deatil">
										<h5 class="fr-can-name"><a href="{{route('front-agents-show',$agent->agent_fk->slug)}}"><?php if(app()->getLocale() == 'ar'){echo $agent->agent_fk->name_ar;}else{echo $agent->agent_fk->name_en;} ?></a></h5>
										<span class="fr-position"><i class="lni-map-marker"></i><?php if(app()->getLocale() == 'ar'){echo $agent->agent_fk->title_fk->name_ar;}else{echo $agent->agent_fk->title_fk->name_en;} ?></span>
										<div class="fr-can-rating">
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star filled"></i>
											<i class="ti-star"></i>
										</div>
									</div>
									
								</div>
								
								<div class="fr-grid-info">
									<ul>
										<li>{{__('home.properties')}}<span>{{$agent->agent_fk->proeprty_fk->count()}}</span></li>
										<li>{{__('home.email')}}<span>{{$agent->agent_fk->email}}</span></li>
										<li>{{__('home.phone')}}<span>{{$agent->agent_fk->mobile}}</span></li>
									</ul>
								</div>
								
								<div class="fr-grid-footer">
									<a href="{{route('front-agents-show',$agent->agent_fk->slug)}}" class="btn btn-outline-theme full-width">{{__('home.view_profile')}}<i class="ti-arrow-right ml-1"></i></a>
								</div>
								
							</div>
						</div>


						@endforeach
						
				
						
					</div>
					
				</div>
			</section>

            <!-- ============================ Smart Testimonials ================================== -->
			<section class="image-cover pb-0" style="background:#122947 url(front/assets/img/pattern.png) no-repeat;">
				<div class="container">
					<div class="row align-items-center">
						
						<div class="col-lg-6 col-md-7">
							<h2 class="text-light">{{__('home.what_says')}}</h2>
							
							<div class="smart-textimonials smart-light" id="smart-textimonials">
								
								<!-- Single Item -->
								<div class="item">
									<div class="smart-tes-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
									
									<div class="smart-tes-author">
										<div class="st-author-box">
											<div class="st-author-thumb">
												<img src="front/assets/img/user-3.jpg" class="img-fluid" alt="" />
											</div>
											<div class="st-author-info">
												<h4 class="st-author-title">Adam Williams</h4>
												<span class="st-author-subtitle">CEO Of Microwoft</span>
											</div>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="smart-tes-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
									
									<div class="smart-tes-author">
										<div class="st-author-box">
											<div class="st-author-thumb">
												<img src="front/assets/img/user-8.jpg" class="img-fluid" alt="" />
											</div>
											<div class="st-author-info">
												<h4 class="st-author-title">Rita Deluxea</h4>
												<span class="st-author-subtitle">CEO Of Microwoft</span>
											</div>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="smart-tes-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
									
									<div class="smart-tes-author">
										<div class="st-author-box">
											<div class="st-author-thumb">
												<img src="front/assets/img/user-4.jpg" class="img-fluid" alt="" />
											</div>
											<div class="st-author-info">
												<h4 class="st-author-title">Adam Gilwarm</h4>
												<span class="st-author-subtitle">CEO Of Applioa</span>
											</div>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="smart-tes-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
									
									<div class="smart-tes-author">
										<div class="st-author-box">
											<div class="st-author-thumb">
												<img src="front/assets/img/user-5.jpg" class="img-fluid" alt="" />
											</div>
											<div class="st-author-info">
												<h4 class="st-author-title">Adam Williams</h4>
												<span class="st-author-subtitle">CEO Of Missward</span>
											</div>
										</div>
									</div>
								</div>
								
								<!-- Single Item -->
								<div class="item">
									<div class="smart-tes-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									</div>
									
									<div class="smart-tes-author">
										<div class="st-author-box">
											<div class="st-author-thumb">
												<img src="front/assets/img/user-6.jpg" class="img-fluid" alt="" />
											</div>
											<div class="st-author-info">
												<h4 class="st-author-title">Shilpa Srivastava</h4>
												<span class="st-author-subtitle">CEO Of Microwoft</span>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						
						<div class="col-lg-6 col-md-5">
							<img src="front/assets/img/avatar-large-1.png" class="img-fluid" alt="">
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Smart Testimonials End ================================== -->
			

            <!-- ================================= Blog Grid ================================== -->
			<section>
				<div class="container">
				
					<div class="row">
						<div class="col text-center">
							<div class="sec-heading center">
								<h2>{{__('home.trending_articles_title')}}</h2>
								<p>{{__('home.trending_articles_second')}}</p>
							</div>
						</div>
					</div>
					
					<div class="row">
						
						@foreach ($articles as $article)
							<!-- Single blog Grid -->
						<div class="col-lg-4 col-md-6">
							<div class="blog-wrap-grid">
								
								<div class="blog-thumb">
									<a href="{{route('article.show',['article'=>$article->slug])}}"><img src="{{$article->main_image()}}" class="img-fluid" alt="" /></a>
								</div>
								
								<div class="blog-info">
									<span class="post-date"><i class="ti-calendar"></i><time class="updated" >{{\Carbon::parse($article->created_at)->diffForHumans()}}</time></span>
								</div>
								
								<div class="blog-body">
									<h4 class="bl-title"><a href="blog-detail.html"><?php if(app()->getLocale() == 'ar'){echo substr($article->title_ar,0,25);}else{echo substr($article->title_en,0,25);} ?></a></h4>
									<p><?php if(app()->getLocale() == 'ar'){echo substr($article->description_ar,0,60);}else{echo substr($article->description_en,0,60);} ?></p>
									<a href="{{route('article.show',['article'=>$article->slug])}}" class="bl-continue">{{__('home.continue')}}</a>
								</div>
								
							</div>
						</div>
						@endforeach
						
						
					
						
					</div>
					
				</div>		
			</section>
			<!-- ================= Blog Grid End ================= -->

			<!-- ============================ Agencies Start ================================== -->

			<section>
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="sec-heading2 text-center">
								<div class="sec-left">
									<h2>{{__('home.features_agencies')}}</h2>
									<p>{{__('home.find_new_agencies')}}</p>
								</div>
						
							</div>
						</div>
					</div>
					
					<div class="row">
						
						@foreach ($agencies_feaures as $agency)
								<!-- Single Agent -->
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="agents-grid">
								
								<div class="jb-bookmark"><a href="javascript:void(0)" data-toggle="tooltip" data-original-title="Bookmark"><i class="ti-bookmark"></i></a></div>
								<div class="agent-call"><a href="#"><i class="lni-phone-handset"></i></a></div>
								<div class="agents-grid-wrap">
									
									<div class="fr-grid-thumb">
										<a href="agent-page.html">
											<div class="overall-rate">4.5</div>
											<img src="{{$agency->agency_fk->main_image()}}" class="img-fluid mx-auto" alt="">
										</a>
									</div>
									<div class="fr-grid-deatil">
										<h5 class="fr-can-name"><a href="agent-page.html"><?php if(app()->getLocale() == 'ar'){echo $agency->agency_fk->name_ar;}else{echo $agency->agency_fk->name_en;} ?></a></h5>
										<span class="fr-position"><i class="lni-map-marker"></i>{{$agency->agency_fk->address}}</span>
										<span class="agent-type theme-cl">{{$agency->agency_fk->properties_fk->count()}}</span>
									</div>
									
								</div>
								
								<div class="fr-grid-footer">
									<ul class="fr-grid-social">
										<li><a href="#"><i class="ti-facebook"></i></a></li>
										<li><a href="#"><i class="ti-twitter"></i></a></li>
										<li><a href="#"><i class="ti-instagram"></i></a></li>
										<li><a href="#"><i class="ti-linkedin"></i></a></li>
									</ul>
								</div>
								
							</div>
						</div>
						@endforeach
					
						
					
						
							
					</div>
					<div class="sec-right text-center">
						<a href="half-map.html">View All<i class="ti-angle-double-right ml-2"></i></a>
					</div>
				</div>
					
			</section>

			<!-- ============================ Agencies end ================================== -->

			<!-- ============================ Call To Action ================================== -->
			<section class="theme-bg call-to-act-wrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							
							<div class="call-to-act">
								<div class="call-to-act-head">
									<h3>{{__('home.come_agent_title')}}</h3>
									<span>{{__('home.come_agent_second')}}</span>
								</div>
								<a href="#" class="btn btn-call-to-act">{{__('home.signup_now')}}</a>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Call To Action End ================================== -->
			

@endsection