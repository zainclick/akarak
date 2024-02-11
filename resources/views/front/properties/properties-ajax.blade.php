<div class="col-lg-12 col-md-12">
									<div class="filter-fl">
										<h4>{{__('front/properties/index.total_properties')}} <span class="theme-cl">{{$properties->count()}}</span></h4>
										<!--
										<div class="btn-group custom-drop">
											<button type="button" class="btn btn-order-by-filt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												{{__('front/properties/index.sort_by')}} <i class="ti-angle-down"></i>
											</button>
											<div class="dropdown-menu pull-right animated flipInX">
												<a class="latest-select" >{{__('front/properties/index.latest')}}</a>
												<a class="most-views-select" >{{__('front/properties/index.most_views')}}</a>
												<a class="most-popular-select">{{__('front/properties/index.most_popular')}}</a>
											</div>
										</div>
										-->
									</div>
								</div>
								
							@foreach ($properties as $property)
							<?php 
								$img = App\Models\Backend\PropertiesImages::where('property',$property->id)->first();
							?>
							<!-- Single Property Start -->
									<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="{{route('front-properties-show',$property->slug)}}">
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
															<span class="property-type"><?php if($property->property_status == 1){echo __('front/properties/index.rent');}else{echo __('front/properties/index.sale');} ?></span>
															<span class="true-check">TrueCheck<i class="list-status ti-check"></i></span>

														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="{{route('front-properties-show',$property->slug)}}"><?php if(app()->getLocale() == 'ar'){echo substr($property->title_ar,0,65);}else{echo substr($property->title_en,0,65);} ?></a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>{{$property->address}}</span>
																	<a class="a-agency" href="http://127.0.0.1:8000/admin/profile/edit">

																	<img src="{{$property->agency_fk->main_image()}}" class="d-inline-block">
																		</a>
																</div>
																<div class="list-author">
																	<a href="#"><img src="front/assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-bed"></span><strong>{{__('front/properties/index.bed')}}:</strong>{{$property->bedrooms}}</li>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-bath"></span><strong>{{__('front/properties/index.bath')}}:</strong>{{$property->bathrooms}}</li>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-area"></span><strong>{{__('front/properties/index.sqft')}}:</strong>{{$property->sqft}}</li>
																</ul>
															</div>
													
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<span class="list-pr" style="color:#fd5332;font-weight: bold;">{{$property->price}} / </span><small style="color:#fd5332;font-weight: bold;">{{__('front/properties/index.aed')}}</small>
																</div>

															<div class="listing-contact-info">
																<ul class="social-icons">
																<li><a class="facebook" href="#"><i class="lni-phone-handset"></i>{{__('front/properties/index.call')}}</a></li>
																<li><a class="twitter" href="#"><i class="fa fa-envelope"></i>{{__('front/properties/index.email')}}</a></li>
																</ul>
															</div>
																<div class="listing-detail-btn">
																	<a href="single-property-2.html" class="more-btn">{{__('front/properties/index.more_info')}}</a>
																</div>
															</div>
															
														</div>
														
													</div>
								<!-- Single Property End -->	
							@endforeach
									
								
							</div>