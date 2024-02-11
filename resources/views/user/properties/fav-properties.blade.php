

@extends('layouts.front.master')
@section('title')
    {{__('user/properties/fav-properties.title')}}
@endsection
@section('content')

<div class="container-fluid" style="margin-top: 50px;margin-bottom: 50px;">
								
					<div class="row">
						
						@include('layouts.front.nav-user')
						
						<div class="col-lg-8 col-md-12 col-md-12 list-layout">
							<div class="row put-search-filter">
							
								<div class="col-lg-12 col-md-12">
									<div class="filter-fl">
										<div class="btn-group custom-drop">
											<button type="button" class="btn btn-order-by-filt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Short By<i class="ti-angle-down"></i>
											</button>
											<div class="dropdown-menu pull-right animated flipInX">
												<a href="#">Latest</a>
												<a href="#">Most View</a>
												<a href="#">Most Popular</a>
											</div>
										</div>
										<div class="btn-group custom-drop">
											<button type="button" class="btn btn-order-by-filt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Short By<i class="ti-angle-down"></i>
											</button>
											<div class="dropdown-menu pull-right animated flipInX">
												<a href="#">Latest</a>
												<a href="#">Most View</a>
												<a href="#">Most Popular</a>
											</div>
										</div>
									</div>
								</div>
								
							@foreach ($properties as $property)
							<?php 
								$img = App\Models\Backend\PropertiesImages::where('property',$property->property)->first();
							?>
							<!-- Single Property Start -->
									<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="{{route('front-properties-show',$property->property_fk->slug)}}">
																<img src="/images/properties/{{$img->image}}" class="img-fluid mx-auto" alt="">
															</a>
															<form >
															<div class="listing-like-top" >
															<input type="hidden" name="property" value="{{$property->property_fk->id}}">
																<?php 
																$fave = "";
																if(auth('front-user')->check()){
																	$fave = App\Models\User\UsersFavorites::where(['property' => $property->property_fk->id,'user' => auth('front-user')->user()->id])->first();

																}
																?>
																<i class="fa fa-heart add-fave-heart <?php if($fave != null){echo 'success-fave';} ?>"></i>
															</div>
															<div class="listing-rating">
																<i class="ti-star filled"></i>
																<i class="ti-star filled"></i>
																<i class="ti-star filled"></i>
																<i class="ti-star filled"></i>
																<i class="ti-star"></i>
															</div>
															</form>
															<span class="property-type"><?php if($property->property_fk->property_status == 1){echo __('front/properties/index.rent');}else{echo __('front/properties/index.sale');} ?></span>
															<span class="true-check">TrueCheck<i class="list-status ti-check"></i></span>

														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="{{route('front-properties-show',$property->property_fk->slug)}}"><?php if(app()->getLocale() == 'ar'){echo substr($property->property_fk->title_ar,0,65);}else{echo substr($property->property_fk->title_en,0,65);} ?></a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>{{$property->property_fk->address}}</span>
																	<a class="a-agency" href="http://127.0.0.1:8000/admin/profile/edit">

																	<img src="" class="d-inline-block">
																		</a>
																</div>
																<div class="list-author">
																	<a href="#"><img src="front/assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-bed"></span><strong>{{__('front/properties/index.bed')}}:</strong>{{$property->property_fk->bedrooms}}</li>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-bath"></span><strong>{{__('front/properties/index.bath')}}:</strong>{{$property->property_fk->bathrooms}}</li>
																	<li class="listing-card-info-icon"><span class="inc-fleat inc-area"></span><strong>{{__('front/properties/index.sqft')}}:</strong>{{$property->property_fk->sqft}}</li>
																</ul>
															</div>
													
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<span class="list-pr" style="color:#fd5332;font-weight: bold;">{{$property->property_fk->price}} / </span><small style="color:#fd5332;font-weight: bold;">{{__('front/properties/index.aed')}}</small>
																</div>

															<div class="listing-contact-info">
																<ul class="social-icons">
																<li><a class="facebook" href="#"><i class="lni-phone-handset"></i>{{__('front/properties/index.call')}}</a></li>
																<li><a class="twitter" href="#"><i class="fa fa-envelope"></i>{{__('front/properties/index.email')}}</a></li>
																</ul>
															</div>
																<div class="listing-detail-btn">
																	<a href="{{route('front-properties-show',$property->property_fk->slug)}}" class="more-btn">{{__('front/properties/index.more_info')}}</a>
																</div>
															</div>
															
														</div>
														
													</div>
								<!-- Single Property End -->	
							@endforeach
							
								
							</div>
							
							<!-- Pagination -->
							<div class="row">
								<div class="col-12 p-3">
									
								</div>
							</div>
					
						</div>


						
					</div>
				</div>

@endsection

@section('scripts')

<script>
$(document).on('click','.delete',function(e){
    e.preventDefault();
	var section = $(this).parent().parent().parent();
	$(section).remove();
    var Form = $(this).parent().serialize();
    $.ajax({
        type:'GET',
        url:'{{route('remove-fave-property')}}',
        data: Form,
        contentType:false,
        processData:false,

        success:function(data) {
			
			
        }
             
        })
              
        }); 

</script>

@endsection
