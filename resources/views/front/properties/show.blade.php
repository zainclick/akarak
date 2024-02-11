@extends('layouts.front.master')
@section('title')
    {{__('home.title')}}
@endsection
@section('content')

					<!-- ============================ Hero Banner  Start================================== -->
			<div class="featured-slick">
				<div class="featured-slick-slide">
				@foreach ($images as $image)
					<div><a href="/images/properties/{{$image->image}}" class="mfp-gallery"><img src="/images/properties/{{$image->image}}" class="img-fluid mx-auto" alt="" /></a></div>
				@endforeach

				</div>
			</div>
			
			<section class="spd-wrap">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-12 col-md-12">
						
							<div class="slide-property-detail">
								
								<div class="slide-property-first">
									<div class="pr-price-into">
										<h4>{{$property->price}} <i> <?php if($property->rent_type != null){if($property->rent_type == 'monthly'){echo __('front/properties/show.monthly');}else{echo __('front/properties/show.year');}} ?></i> <span class="prt-type rent"><?php if($property->property_status == 1){echo __('front/properties/show.rent');}else{echo __('front/properties/show.sale');} ?></span></h2>
										<span><i class="lni-map-marker"></i> {{$property->address}}</span>
									</div>
								</div>
								
								<div class="slide-property-sec">
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
								
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- ============================ Hero Banner End ================================== -->

			<section class="gray">
				<div class="container">
					<div class="row">
						
						<!-- property main detail -->
						<div class="col-lg-8 col-md-12 col-sm-12">
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">{{__('front/properties/show.property_info')}}</h4>
								</div>
								
								<div class="block-body">
									<ul class="dw-proprty-info">
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
									<h4 class="block-title">{{__('front/properties/show.description')}}</h4>
								</div>
								
								<div class="block-body">
									<p>{{$property->description}}</p>
								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">{{__('front/properties/show.ameneties')}}</h4>
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
									<h4 class="block-title">{{__('front/properties/show.floor_plan')}}</h4>
								</div>
								
								<div class="block-body">
									<div class="accordion" id="floor-option">
										<div class="card">
											<div class="card-header" id="firstFloor">
												<h2 class="mb-0">
													<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#firstfloor">First Floor<span>740 sq ft</span></button>									
												</h2>
											</div>
											<div id="firstfloor" class="collapse" aria-labelledby="firstFloor" data-parent="#floor-option">
												<div class="card-body">
													<img src="assets/img/floor.jpg" class="img-fluid" alt="">
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="seconfFloor">
												<h2 class="mb-0">
													<button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#secondfloor">Second Floor<span>710 sq ft</span></button>
												</h2>
											</div>
											<div id="secondfloor" class="collapse show" aria-labelledby="seconfFloor" data-parent="#floor-option">
												<div class="card-body">
													<img src="assets/img/floor.jpg" class="img-fluid" alt="">
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
													<img src="assets/img/floor.jpg" class="img-fluid" alt="">
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">{{__('front/properties/show.Location')}}</h4>
								</div>
								
								<div class="block-body">
									<div class="map-container">
										<div id="singleMap" class="mb-0" data-latitude="40.7427837" data-longitude="-73.11445617675781" data-maptitle="Our Location" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-err-container"><div class="gm-err-content"><div class="gm-err-icon"><img src="https://maps.gstatic.com/mapfiles/api-3/images/icon_error.png" alt="" draggable="false" style="user-select: none;"></div><div class="gm-err-title">Oops! Something went wrong.</div><div class="gm-err-message">This page didn't load Google Maps correctly. See the JavaScript console for technical details.</div></div></div></div><div style="background-color: white; font-weight: 500; font-family: Roboto, sans-serif; padding: 15px 25px; box-sizing: border-box; top: 5px; border: 1px solid rgba(0, 0, 0, 0.12); border-radius: 5px; left: 50%; max-width: 375px; position: absolute; transform: translateX(-50%); width: calc(100% - 10px); z-index: 1;"><div><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google_gray.svg" draggable="false" style="padding: 0px; margin: 0px; border: 0px; height: 17px; vertical-align: middle; width: 52px; user-select: none;"></div><div style="line-height: 20px; margin: 15px 0px;"><span style="color: rgba(0, 0, 0, 0.87); font-size: 14px;">This page can't load Google Maps correctly.</span></div><table style="width: 100%;"><tr><td style="line-height: 16px; vertical-align: middle;"><a href="https://developers.google.com/maps/documentation/javascript/error-messages?utm_source=maps_js&amp;utm_medium=degraded&amp;utm_campaign=billing#api-key-and-billing-errors" target="_blank" rel="noopener" style="color: rgba(0, 0, 0, 0.54); font-size: 12px;">Do you own this website?</a></td><td style="text-align: right;"><button class="dismissButton">OK</button></td></tr></table></div></div>
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
									<h4 class="block-title">{{__('front/properties/show.nearby_places')}}</h4>
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
							
								<!-- Agent Detail -->
								<div class="agent-widget">
									<div class="agent-title">
										<div class="agent-photo"><a href="{{route('front-agents-show',$property->agent_fk->slug)}}"><img src="{{$property->agent_fk->main_image()}}" alt=""></a></div>
										<div class="agent-details">
											<h4><a href="{{route('front-agents-show',$property->agent_fk->slug)}}">{{$property->agent_fk->name_en}}</a></h4>
											<span><i class="lni-phone-handset"></i>{{$property->agent_fk->mobile}}</span>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="agent-contact-btn">
											<a class="btn btn-theme full-width" href="" ><i class="lni-phone-handset"></i><span>{{__('main.call')}}</span></a>

											<a class="btn btn-theme full-width" href="#" data-toggle="modal" data-target="#email-agent"><i class="fa fa-envelope"></i><span>{{__('main.email')}}</span></a>

											<a class="btn btn-success full-width" href=""><i class="fa fa-envelope"></i> <span>{{__('main.whatsapp')}}</span></a>
									</div>
										
										
								</div>

								
								<!-- Featured Property -->
								<div class="sidebar-widgets">
									@if($props_features->count() > 0) 
									<h4 style="font-size: 17px;margin-left: 15px;">{{__('front/properties/show.features_property')}}</h4>
									
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
						</div>
						
					</div>
				</div>
			</section>

@endsection


@section('model')

			<!-- Email agent In Modal -->
						
			<div class="modal fade" id="email-agent" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="registermodal">
						<span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
						<div class="modal-body">
							<span class="modal-header-title" style="display: inline-block;padding-bottom: 10px;margin-left: -15px;font-weight: bold;">{{__('main.email_agent')}}</span>
							<div class="login-form">
                			<form method="POST" action="{{route('front-user-email-agent')}}" >
								@csrf
									
					<div class="row">
									
						<div class="col-lg-12 col-md-12 col-md-12 list-layout">
							<div class="row put-search-filter">
							
								<!-- Single Property Start -->
									<div class="property-listing property-1" style="height: 145px;border-radius: 0;margin-bottom: 20px;">
										<?php 
											$img = App\Models\Backend\PropertiesImages::where('property',$property->id)->first();
										?>
														<div class="listing-img-wrapper">
															<a>
																<img src="/images/properties/{{$img->image}}" class="img-fluid mx-auto" alt="" style="min-height: 145px;">
															</a>

														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a><?php if(app()->getLocale() == 'ar'){echo substr($property->title_ar,0,25);}else{echo substr($property->title_ar,0,25);} ?></a></h4>
																
																</div>
																<div class="list-author">
																	<a><img src="front/assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info" style="margin-top: -50px;">
																<ul>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-bed"></span>{{$property->bedrooms}}</li>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-bath"></span>{{$property->bathrooms}}</li>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-area"></span>{{$property->sqft}}</li>
																</ul>
															</div>
													
														
															<div class="listing-footer-wrapper" style="padding: .5rem 1rem;">
																<div class="listing-price">
																	<span class="list-pr" style="color:#fd5332;font-weight: bold;">{{$property->price}} / </span><small style="color:#fd5332;font-weight: bold;">AED</small>
																	<div class="agent-photo" style="width: 35px; height: 35px; display: inline-block; float: right;"><a href="{{route('front-agents-show',$property->agent_fk->slug)}}"><img style="width: 100%; height: 100%; border-radius: 50%;" src="{{$property->agent_fk->main_image()}}" alt=""></a></div>

																</div>

															</div>
															
														</div>
														
														
													</div>
								<!-- Single Property End -->	
								<div class="form-submit">	
									<div class="submit-section">
										<div class="form-row" style="margin-right: -15px;margin-left: -15px;">

											<div class="form-group col-md-12">
												<textarea class="form-control" name="msg" placeholder="{{__('main.msg')}}" style="height: 80px;">Hi, I found your property with ref: <?php if(app()->getLocale() == 'ar'){echo $property->agency_fk->name_ar;}else{echo $property->agency_fk->name_en;} ?> on {{config('app.name')}}. Please contact me. Thank you.</textarea>											
											</div>
										
											<div class="form-group col-md-6">
												<input type="text" name="name" class="form-control" placeholder="{{__('main.name')}}" value="<?php if(auth('front-user')->check()){echo auth('front-user')->user()->name;} ?>">
											</div>
											
											<div class="form-group col-md-6">
												<input type="email" name="email" class="form-control" placeholder="{{__('main.email')}}" value="<?php if(auth('front-user')->check()){echo auth('front-user')->user()->email;} ?>">
											</div>

											<input type="hidden" name="property" value="{{$property->id}}">
											<input type="hidden" name="agent" value="{{$property->agent_fk->id}}">

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
			
			<!-- End email agent Modal -->

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