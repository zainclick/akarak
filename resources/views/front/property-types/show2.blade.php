@extends('layouts.front.master')
@section('title')
    {{__('home.title')}}
@endsection
@section('content')

			<!-- ============================ Property Detail Start ================================== -->
			<section class="gray">
				<div class="container">
					<div class="row">
						
						<!-- property main detail -->
						<div class="col-lg-8 col-md-12 col-sm-12">
							
							<div class="slide-property-first mb-4">
								<div class="pr-price-into">
									<h2>{{$property->price}} <i><?php if($property->rent_type != null){if($property->rent_type == 'monthly'){echo __('front/properties/show.monthly');}else{echo __('front/properties/show.year');}} ?></i> <span class="prt-type rent"><?php if($property->property_status == 1){echo __('front/properties/show.rent');}else{echo __('front/properties/show.sale');} ?></span></h2>
									<span><i class="lni-map-marker"></i> {{$property->address}}</span>
									<p><i class="fa fa-eye"></i> {{__('front/properties/show.views')}}: {{$property->views	}}</p>
								</div>
							</div>
								
							<div class="property3-slide single-advance-property mb-4">
						
								<div class="slider-for">

								@foreach ($images as $image)

									<a href="/images/properties/{{$image->image}}" class="item-slick"><img src="/images/properties/{{$image->image}}" alt="Alt"></a>

								@endforeach

								</div>
								<div class="slider-nav">
								@foreach ($images as $image)
									<div class="item-slick"><img src="/images/properties/{{$image->image}}" alt="Alt"></div>
								@endforeach

								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">{{__('front/properties/show.property_info')}}</h4>
								</div>
								
								<div class="block-body">
									<ul class="dw-proprty-info text-center">
										
										@if($property->bedrooms)
											<li><strong>{{__('front/properties/show.bedrooms')}}</strong>{{$property->bedrooms}}</li>
										@endif

										@if($property->bathrooms)
											<li><strong>{{__('front/properties/show.bathrooms')}}</strong>{{$property->bathrooms}}</li>
										@endif

										@if($property->sqft)
											<li><strong>{{__('front/properties/show.sqft')}}</strong>{{$property->sqft}}</li>
										@endif

										<?php
										if($property->type){ ?>
											<li><strong>{{__('front/properties/show.type')}}</strong><?php if(app()->getLocale() == 'ar'){echo $property->type_fk->name_ar;}else{echo $property->type_fk->name_en;} ?></li>
										<?php }
										 ?>

										<?php
										if($property->rent_type){ ?>
											<li><strong>{{__('front/properties/show.rent_type')}}</strong><?php if($property->rent_type == 'monthly'){echo __('front/properties/show.monthly');}else{echo  __('front/properties/show.monthly');} ?></li>
										<?php }
										 ?>

										<?php
										if($property->property_status ){ ?>
											<li><strong>{{__('front/properties/show.prop_status')}}</strong><?php if(app()->getLocale() == 'ar'){echo $property->status_fk->name_ar;}else{echo $property->status_fk->name_en;} ?></li>
										<?php }
										 ?>
											
										@if($property->price)
											<li><strong>{{__('front/properties/show.price')}}</strong>{{$property->price}}</li>
										@endif
										
										<?php
										if($property->city){ ?>
											<li><strong>{{__('front/properties/show.city')}}</strong><?php if(app()->getLocale() == 'ar'){echo $property->city_fk->name_ar;}else{echo $property->city_fk->name_en;} ?></li>
										<?php }
										 ?>
										 @if($property->age)
											<li><strong>{{__('front/properties/show.age')}}</strong>{{$property->age}}</li>
										@endif

					
									</ul>
								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">Description</h4>
								</div>
								
								<div class="block-body">
									{{$property->description}}
								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">Ameneties</h4>
								</div>
								
								<div class="block-body">
									<ul class="avl-features third">
									@foreach ($prop_features_icons as $feature)
										<li><?php if(app()->getLocale() == 'ar'){echo $feature->features_fk->name_ar;}else{echo $feature->features_fk->name_en;} ?></li>
									@endforeach
										
									</ul>
								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">Floor Plan</h4>
								</div>
								
								<div class="block-body">
									<div class="accordion" id="floor-option">
										<div class="card">
											<div class="card-header" id="firstFloor">
												<h2 class="mb-0">
													<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#firstfloor">First Floor<span>740 sq ft</span></button>									
												</h2>
											</div>
											<div id="firstfloor" class="collapse show" aria-labelledby="firstFloor" data-parent="#floor-option">
												<div class="card-body">
													<img src="/front/assets/img/floor.jpg" class="img-fluid" alt="" />
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="seconfFloor">
												<h2 class="mb-0">
													<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#secondfloor">Second Floor<span>710 sq ft</span></button>
												</h2>
											</div>
											<div id="secondfloor" class="collapse" aria-labelledby="seconfFloor" data-parent="#floor-option">
												<div class="card-body">
													<img src="/front/assets/img/floor.jpg" class="img-fluid" alt="" />
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="third-garage">
												<h2 class="mb-0">
													<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#garages">Garage<span>520 sq ft</span></button>                     
												</h2>
											</div>
											<div id="garages" class="collapse" aria-labelledby="third-garage" data-parent="#floor-option">
												<div class="card-body">
													<img src="/front/assets/img/floor.jpg" class="img-fluid" alt="" />
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">Location</h4>
								</div>
								
								<div class="block-body">
									<div class="map-container">
										<div id="singleMap" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-mapTitle="Our Location"></div>
									</div>

								</div>
								
							</div>
							
							<!-- Property Reviews -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">{{$reviews->count() .' '.__('front/properties/show.reviews')}}</h4>
								</div>
								
								<div class="block-body">
									<div class="author-review">
										<div class="comment-list">
											<ul>

											@foreach ($reviews as $review)
												
											
												<li class="article_comments_wrap">
													<article>
														<div class="article_comments_thumb">
															<img src="{{$review->user_fk->getUserAvatar()}}" alt="">
														</div>
														<div class="comment-details">
															<div class="comment-meta">
																<div class="comment-left-meta">
																	<h4 class="author-name">{{$review->user_fk->name}}</h4>
																	<div class="comment-date">{{\Carbon::parse($review->created_at)->diffForHumans()}}</div>
																</div>
															</div>
															<div class="comment-text">
																<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim laborumab.
																	perspiciatis unde omnis iste natus error.</p>
															</div>
														</div>
													</article>
												</li>

											@endforeach
											
											</ul>
										</div>
									</div>
									<a href="#" class="reviews-checked theme-cl"><i class="fas fa-arrow-alt-circle-down mr-2"></i>See More Reviews</a>

								</div>
								
							</div>
							
							<!-- Nearest Places -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">Nearby Places</h4>
								</div>
								
								<div class="block-body">
									
									<!-- Schools -->
									<div class="nearby-wrap">
										<h5>Schools</h5>
										<div class="neary_section_list">
										
											<div class="neary_section">
												<div class="neary_section_first">
													<h4 class="nearby_place_title">Wikdom Senior High Scool</h4>
												</div>
												<div class="neary_section_last">
													<div class="nearby_place_rate good"><i class="ti-star"></i>4.2</div>
													<span>2.5 km</span>
												</div>
											</div>
											
											<div class="neary_section">
												<div class="neary_section_first">
													<h4 class="nearby_place_title">Reena Secondary High Scool</h4>
												</div>
												<div class="neary_section_last">
													<div class="nearby_place_rate mid"><i class="ti-star"></i>4.0</div>
													<span>3.7 km</span>
												</div>
											</div>
											
											<div class="neary_section">
												<div class="neary_section_first">
													<h4 class="nearby_place_title">Victory Primary Scool</h4>
												</div>
												<div class="neary_section_last">
													<div class="nearby_place_rate high"><i class="ti-star"></i>4.8</div>
													<span>2.9 km</span>
												</div>
											</div>
											
										</div>
									</div>
									
									<!-- Hotel & Restaurant -->
									<div class="nearby-wrap">
										<h5>Hotel &amp; Restaurant</h5>
										<div class="neary_section_list">
										
											<div class="neary_section">
												<div class="neary_section_first">
													<h4 class="nearby_place_title">Hotel Singhmind Alite</h4>
												</div>
												<div class="neary_section_last">
													<div class="nearby_place_rate poor"><i class="ti-star"></i>3.2</div>
													<span>1.5 km</span>
												</div>
											</div>
											
											<div class="neary_section">
												<div class="neary_section_first">
													<h4 class="nearby_place_title">Wiksy Bar &amp; Restaurant</h4>
												</div>
												<div class="neary_section_last">
													<div class="nearby_place_rate high"><i class="ti-star"></i>4.9</div>
													<span>2.7 km</span>
												</div>
											</div>
											
										</div>
									</div>
									
								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">{{__('front/properties/show.write_review')}}</h4>
								</div>
								<form action="{{route('front-user-property-review')}}" method="POST">
								@csrf
								<div class="block-body">
									<div class="row">
										
										
									
										<input type="hidden" name="property" class="form-control" value="{{$property->id}}">
										
								
										
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<textarea class="form-control ht-80" name="msg" placeholder="Messages"></textarea>
											</div>
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12">
											<div class="form-group">
												<button class="btn btn-theme" type="submit">{{__('main.send')}}</button>
											</div>
										</div>
										
									</div>
								</div>
								</form>
							</div>
							
							
							
						</div>
						
						<!-- property Sidebar -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="page-sidebar">
								
								<!-- slide-property-sec -->
								<div class="slide-property-sec mb-4">
									<div class="pr-all-info">
										
										<div class="pr-single-info">
											<div class="share-opt-wrap">
												<button type="button" class="btn-share" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-original-title="Share this">
													<i class="lni-share"></i>
												</button>
												<div class="dropdown-menu animated flipInX">
													<a href="#" class="cl-facebook"><i class="lni-facebook"></i></a>
													<a href="#" class="cl-twitter"><i class="lni-twitter"></i></a>
													<a href="#" class="cl-gplus"><i class="lni-google-plus"></i></a>
													<a href="#" class="cl-instagram"><i class="lni-instagram"></i></a>
												</div>
											</div>

										</div>
										
										<div class="pr-single-info">
											<a href="JavaScript:Void(0);" data-toggle="tooltip" data-original-title="Get Print"><i class="ti-printer"></i></a>
										</div>
										
										<div class="pr-single-info">
											<a href="JavaScript:Void(0);" class="compare-button" data-toggle="tooltip" data-original-title="Compare"><i class="ti-control-shuffle"></i></a>
										</div>
										
										<div class="pr-single-info">
										<form>
											<input type="hidden" name="property" value="{{$property->id}}">
												<?php 
												$fave = "";
												if(auth('front-user')->check()){
												$fave = App\Models\User\UsersFavorites::where(['property' => $property->id,'user' => auth('front-user')->user()->id])->first();

												}
												?>
											<a href="JavaScript:Void(0);" class="like-bitt add-to-favorite" data-toggle="tooltip" data-original-title="Add To Favorites"><i class="lni-heart-filled add-fave-heart <?php if($fave != null){echo 'success-fave';} ?>"></i></a>
										</form>
										</div>
										
									</div>
								</div>
								
								<!-- Agent Detail -->
								<div class="agent-widget">
									<div class="agent-title">
										<div class="agent-photo"><img src="{{$property->agent_fk->main_image()}}" alt=""></div>
										<div class="agent-details">
											<h4><a href="#">{{$property->agent_fk->name_en}}</a></h4>
											<span><i class="lni-phone-handset"></i>{{$property->agent_fk->mobile}}</span>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-6">
											<button class="btn btn-theme full-width"><i class="lni-phone-handset"></i> Call</button>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-6">
											<button class="btn btn-theme full-width"><i class="fa fa-envelope"></i> Email</button>
										</div>
									</div>
										
										
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Your Email">
									</div>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Your Phone">
									</div>
									<div class="form-group">
										<textarea class="form-control">I'm interested in this property.</textarea>
									</div>
									<button class="btn btn-theme full-width">Send Message</button>
								</div>
								
								<!-- Find New Property -->
								<div class="sidebar-widgets">
									
									<h4>{{__('front/properties/show.find_property')}}</h4>
									
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
								
								
								<!-- Featured Property -->
								<div class="sidebar-widgets">
									
									<h4>{{__('front/properties/show.features_property')}}</h4>
									
									<div class="sidebar_featured_property">

										@foreach ($props_features as $prop_feature)
											<!-- List Sibar Property -->
										<div class="sides_list_property">
											<div class="sides_list_property_thumb">
												<img src="/front/assets/img/p-1.jpg" class="img-fluid" alt="">
											</div>
											<div class="sides_list_property_detail">
												<h4><a href="single-property-1.html"><?php if(app()->getLocale() == 'ar'){echo substr($prop_feature->property_fk->title_ar,0,25);}else{echo substr($prop_feature->property_fk->title_en,0,25);} ?></a></h4>
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
									
								</div>
							
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Property Detail End ================================== -->


@endsection
