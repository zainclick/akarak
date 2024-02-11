@extends('layouts.front.master')
@section('title')
    {{__('home.title')}}
@endsection
@section('content')
			

			
			<!-- ============================ Start Filter search ================================== -->
			@include('layouts.front.filter-properties')
			<!-- ============================ End Filter search ================================== -->
			<!-- ============================ All Property ================================== -->
			<section>
			
				<div class="container">
					
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="filter_search_opt">
								<a href="javascript:void(0);" onclick="openFilterSearch()">Search Property<i class="ml-2 ti-menu"></i></a>
							</div>
						</div>
					</div>
					
					<div class="row">
						
						<div class="col-lg-8 col-md-12 col-md-12 list-layout">
							<div class="row put-search-filter">
							
								<div class="col-lg-12 col-md-12">
									<div class="filter-fl">
										<h4>{{__('front/properties/index.total_properties')}} <span class="theme-cl">{{$properties->count()}}</span></h4>
										<!--
										<div class="btn-group custom-drop">
											<button type="button" class="btn btn-order-by-filt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												{{__('front/properties/index.sort_by')}}<i class="ti-angle-down"></i>
											</button>
											<div class="dropdown-menu pull-right animated flipInX">
												<a class="latest-select" data-attr="DESC">{{__('front/properties/index.latest')}}</a>
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
																	<a href="{{route('front-properties-show',$property->slug)}}" class="more-btn">{{__('front/properties/index.more_info')}}</a>
																</div>
															</div>
															
														</div>
														
													</div>
								<!-- Single Property End -->	
							@endforeach
									
								
							</div>
							
							<!-- Pagination -->
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul class="pagination p-center">
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
						
					<!-- property Sidebar -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="simple-sidebar sm-sidebar" id="filter_search"  style="left:0;">							
							
								<div class="search-sidebar_header">
									<h4 class="ssh_heading">Close Filter</h4>
									<button onclick="closeFilterSearch()" class="w3-bar-item w3-button w3-large"><i class="ti-close"></i></button>
								</div>
								
								<!-- Find New Property -->
								<div class="sidebar-widgets">
									
									<h5 class="mb-3">Find New Property</h5>
									
									<div class="form-group">
										<div class="input-with-icon">
											<input type="text" class="form-control" placeholder="Neighborhood">
											<i class="ti-search"></i>
										</div>
									</div>
									
									<div class="form-group">
										<div class="input-with-icon">
											<input type="text" class="form-control" placeholder="Location">
											<i class="ti-location-pin"></i>
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
								
									
									
									
									
									
									<div class="range-slider">
										<label>Custom Price</label>
										<div data-min="0" data-max="50000" data-min-name="min_price" data-max-name="min_price" data-unit="USD" class="range-slider-ui ui-slider" aria-disabled="false"></div>
										<div class="clearfix"></div>
									</div>
									
									<div class="range-slider">
										<label>Area</label>
										<div data-min="0" data-max="10000" data-min-name="min_area" data-max-name="max_area" data-unit="Sq ft" class="range-slider-ui ui-slider" aria-disabled="false"></div>
										<div class="clearfix"></div>
									</div>

									<div class="ameneties-features">
										
										<button class="btn btn-theme full-width">Find New Home</button>
									
									</div>
							
								</div>
							</div>
							<!-- Sidebar End -->
						
						</div>
						
					</div>
				</div>	
			</section>
			<!-- ============================ All Property ================================== -->

@endsection

@section('scripts')

<script>
$(document).on('change','#filter-search',function(e){
    e.preventDefault();
    var Form = $(this).serialize();
    $.ajax({
        type:'GET',
        url:'{{route('front-properties-search')}}',
        data: Form,
        contentType:false,
        processData:false,
			beforeSend: function() {
				
					
            $(".put-search-filter").html('<div class="loading-spinner"><i style="color: #fd5332;" class="fas fa-circle-notch fa-spin"></i></div>');
          		
		},
        success:function(data) {  
			setTimeout(function(){   
        		$(".put-search-filter").html(data);
			},1000)
        }
             
        })
              
        }); 

</script>

@endsection
