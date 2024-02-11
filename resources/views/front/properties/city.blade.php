@extends('layouts.front.master')
@section('title')
    <?php if(app()->getLocale() == 'ar'){echo __('front/city/index.title')." ".$getCity->name_ar;}else{echo __('front/city/index.title')." ".$getCity->name_en;} ?>
@endsection
@section('content')



			<!-- ============================ About Agency ================================== -->


			<section class="gray">
				<div class="container">
					<div class="row">
					
						<!-- property main detail -->
						<div class="col-lg-8 col-md-12 col-sm-12">
							
							
							<!-- Single Block Wrap -->
							<div class="block-wraps">
								
								<div class="block-header">
									<ul class="nav nav-tabs customize-tab" id="myTab" role="tablist">
									  <li class="nav-item">
										<a class="nav-link active" id="rental-tab" data-toggle="tab" href="#rental" role="tab" aria-controls="rental" aria-selected="true">{{__('front/city/index.rent')}}</a>
									  </li>
									  <li class="nav-item">
										<a class="nav-link" id="sale-tab" data-toggle="tab" href="#sale" role="tab" aria-controls="sale" aria-selected="false">{{__('front/city/index.sale')}}</a>
									  </li>
									</ul>
								</div>
								
								<div class="block-body">
									<div class="tab-content" id="myTabContent">
									
										<div class="tab-pane fade show active" id="rental" role="tabpanel" aria-labelledby="rental-tab">
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
											
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12">
													<ul class="pagination">
														<li class="page-item">
														  <a class="page-link" href="#" aria-label="Previous">
															<span class="ti-arrow-left"></span>
															<span class="sr-only">Previous</span>
														  </a>
														</li>
														<li class="page-item"><a class="page-link" href="#">1</a></li>
														<li class="page-item"><a class="page-link" href="#">2</a></li>
														<li class="page-item active"><a class="page-link" href="#">3</a></li>
														<li class="page-item"><a class="page-link" href="#">...</a></li>
														<li class="page-item"><a class="page-link" href="#">18</a></li>
														<li class="page-item">
														  <a class="page-link" href="#" aria-label="Next">
															<span class="ti-arrow-right"></span>
															<span class="sr-only">Next</span>
														  </a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										
										<div class="tab-pane fade" id="sale" role="tabpanel" aria-labelledby="sale-tab">
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
											
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12">
													<ul class="pagination">
														<li class="page-item">
														  <a class="page-link" href="#" aria-label="Previous">
															<span class="ti-arrow-left"></span>
															<span class="sr-only">Previous</span>
														  </a>
														</li>
														<li class="page-item"><a class="page-link" href="#">1</a></li>
														<li class="page-item"><a class="page-link" href="#">2</a></li>
														<li class="page-item active"><a class="page-link" href="#">3</a></li>
														<li class="page-item"><a class="page-link" href="#">...</a></li>
														<li class="page-item"><a class="page-link" href="#">18</a></li>
														<li class="page-item">
														  <a class="page-link" href="#" aria-label="Next">
															<span class="ti-arrow-right"></span>
															<span class="sr-only">Next</span>
														  </a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									  
									</div>
								</div>
								
							</div>
							
						</div>
						
						<!-- property Sidebar -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="page-sidebar">
								
							<!-- Featured Property -->
								<div class="sidebar-widgets">
									
									<h4>{{__('front/city/index.features_properties')}}</h4>
									
									<div class="sidebar-property-slide">
										
										@foreach ($props_feaures as $p_feature)
										<?php 
											$img = App\Models\Backend\PropertiesImages::where('property',$p_feature->property)->first();
										?>
												<!-- Single Property -->
										<div class="single-items">
											<div class="property-listing property-1">
									
												<div class="listing-img-wrapper">
													<a href="{{route('front-properties-show',$p_feature->property_fk->slug)}}">
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
															<span class="property-type"><?php if($p_feature->property_fk->property_status == 1){echo __('front/city/index.rent');}else{echo __('front/city/index.sale');} ?></span>
												</div>
												
												<div class="listing-content">
												
													<div class="listing-detail-wrapper">
														<div class="listing-short-detail">
															<h4 class="listing-name"><a href="single-property-2.html"><?php if(app()->getLocale() == 'ar'){echo substr($p_feature->property_fk->title_ar,0,30);}else{echo substr($p_feature->property_fk->title_en,0,30);} ?></a></h4>
															<span class="listing-location"><i class="ti-location-pin"></i>{{$p_feature->property_fk->address}}</span>
														</div>
														<div class="list-author">
															<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
														</div>
													</div>
												
													<div class="listing-features-info">
														<ul>
															<li><strong>{{__('front/city/index.bed')}}:</strong>{{$p_feature->property_fk->bedrooms}}</li>
															<li><strong>{{__('front/city/index.bath')}}:</strong>{{$p_feature->property_fk->bathrooms}}</li>
															<li><strong>{{__('front/city/index.sqft')}}:</strong>{{$p_feature->property_fk->sqft}}</li>
														</ul>
													</div>
												
													<div class="listing-footer-wrapper">
														<div class="listing-price">
															<h4 class="list-pr">{{$p_feature->property_fk->price}}</h4>
														</div>
														<div class="listing-detail-btn">
															<a href="single-property-2.html" class="more-btn">{{__('front/city/index.more_info')}}</a>
														</div>
													</div>
													
												</div>
												
											</div>
										</div>
										@endforeach
									
									
										
									</div>
									
								</div>



								<!-- Find New Property -->
								<div class="sidebar-widgets">
									
									<h4>Find New Property</h4>
									
									<div class="form-group">
										<div class="input-with-icon">
											<input type="text" class="form-control" placeholder="Neighborhood">
											<i class="ti-search"></i>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="text" class="form-control" placeholder="Minimum">
													<i class="ti-money"></i>
												</div>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6">
											<div class="form-group">
												<div class="input-with-icon">
													<input type="text" class="form-control" placeholder="Maximum">
													<i class="ti-money"></i>
												</div>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="input-with-icon">
											<select id="bedrooms" class="form-control">
												<option value="">&nbsp;</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
											<i class="fas fa-bed"></i>
										</div>
									</div>
									
									<div class="form-group">
										<div class="input-with-icon">
											<select id="bathrooms" class="form-control">
												<option value="">&nbsp;</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
											<i class="fas fa-bath"></i>
										</div>
									</div>
									
									<div class="form-group">
										<div class="input-with-icon">
											<select id="cities" class="form-control">
												<option value="">&nbsp;</option>
												<option value="1">Los Angeles, CA</option>
												<option value="2">New York City, NY</option>
												<option value="3">Chicago, IL</option>
												<option value="4">Houston, TX</option>
												<option value="5">Philadelphia, PA</option>
												<option value="6">San Antonio, TX</option>
												<option value="7">San Jose, CA</option>
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
									
									<button class="btn btn-theme full-width">Find New Home</button>
									
								</div>
								
							
								
							</div>
						</div>
						
					
					</div>					
				</div>	
			</section>


			<!-- ============================ About Agency End ================================== -->

@endsection
