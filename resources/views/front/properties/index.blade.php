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

						<div class="block-wrap">			
							<div class="block-body">
								<div class="row">
									@foreach ($types as $type)
									<?php 
									if($type->properties_fk->count() > 0){ ?>
										<div class='col-lg-3 col-md-3'>
											<div><a href="{{route('front-properties-type-slug',$type->slug)}}"><?php if(app()->getLocale() == 'ar'){echo $type->name_ar;}else{echo $type->name_en;} echo " ( " . $type->properties_fk->count() ." )";?></a></div>
										</div>
									<?php }
									?>
										
									@endforeach
								</div>	
							</div>
									
						</div>

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
												<img src="/images/properties/{{$img->image}}" class="img-fluid mx-auto" alt="" />
											</a>
											<form>
											<div class="listing-like-top">
											<input type="hidden" name="property" value="{{$property->id}}">
											<?php 
												$fave = "";
												if(auth('front-user')->check()){
												$fave = App\Models\User\UsersFavorites::where(['property' => $property->id,'user' => auth('front-user')->user()->id])->first();

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
											<span class="property-type"><?php if($property->property_status == 1){echo __('front/properties/index.rent');}else{echo __('front/properties/index.sale');} ?></span>
											<span class="true-check">TrueCheck<i class="list-status ti-check"></i></span>

										</div>
										
										<div class="listing-content">
										
											<div class="listing-detail-wrapper">
												<div class="listing-short-detail">
												<h4 class="listing-name"><a href="{{route('front-properties-show',$property->slug)}}"><?php if(app()->getLocale() == 'ar'){echo substr($property->title_ar,0,65);}else{echo substr($property->title_en,0,65);} ?></a></h4>
												<span class="listing-location"><i class="ti-location-pin"></i>{{substr($property->address,0,25)}}</span>
												</div>
												<div class="list-author">
													<a href="#">
														<img src="{{$property->agent_fk->main_image()}}" class="img-fluid img-circle avater-30" alt=""></a>
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
												<div class="listing-detail-btn">
													<a href="single-property-2.html" class="more-btn"><i class="lni-phone-handset"></i> {{__('main.call')}}</a>
													<a href="single-property-2.html" class="more-btn"><i class="fa fa-envelope"></i> {{__('main.email')}}</a>

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
									{{$properties->appends(request()->query())->render()}}
								</div>
							</div>
					
						</div>
						
					<!-- property Sidebar -->
						<div class="col-lg-4 col-md-12 col-sm-12">

						<div class="sidebar-category-widget mb-4 pb-1" style="margin-top: 41px">
										<div class="card border-0">
											<div class="card-body p-4">
												<h4 class="title mb-4">Property Category</h4>

												<ul class="list-unstyled">
												@foreach ($types as $type)
													
													<li><a href="{{route('front-properties-type-slug',$type->slug)}}" class="d-flex align-items-center text-decoration-none"><?php if(app()->getLocale() == 'ar'){echo $type->name_ar;}else{echo $type->name_en;} ?> <span class="ml-auto">{{$type->properties_fk->count()}} properties</span></a></li>

												@endforeach
												</ul>
											</div>
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


									
							<!-- Start Ads -->
								<div class="block-wrap">
									
									<div class="block-header ags">
										<h4 class="block-title">Ads</h4>
									</div>
									
									<div class="block-body">
										
										ads

									</div>
									
								</div>
							<!-- End Ads -->
								
								
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
				
			 
    function make_skeleton()
    {
      var output = '';
      for(var count = 0; count < 10; count++)
      {
        output += '<div class="col-lg-12 col-md-12 col-md-12 list-layout skeleton">';
        output += '<div class="property-listing property-1">';
        output += '<div class="listing-img-wrapper"></div>';
        output += '<div class="listing-content">';
        output += '<div class="listing-detail-wrapper">';
        output += '<div class="listing-short-detail">';
        output += '<h4 class="listing-name"></h4>';
        output += '<span class="listing-location"></span>';
        output += '<a class="a-agency"></a>';
        output += '</div>';
        output += '<div class="list-author"></div>';
        output += '</div>';
        output += '<div class="listing-features-info">';
        output += '<ul>';
		output += '<li class="listing-card-info-icon"></li>';
		output += '<li class="listing-card-info-icon"></li>';
		output += '<li class="listing-card-info-icon"></li>';
        output += '</ul>';
        output += '</div>';
        output += '<div class="listing-footer-wrapper">';
        output += '<div class="listing-price">';
        output += '<span class="list-pr"></span>';
        output += '</div>';
        output += '<div class="listing-contact-info">';
        output += '<ul class="social-icons">';
        output += '<li></li>';
        output += '<li></li>';
        output += '</ul>';
        output += '</div>';
        output += '<div class="listing-detail-btn"></div>';
        output += '</div>';
        output += '</div>';
        output += '</div>';
        output += '</div>';

      }
      return output;
    }

            $(".put-search-filter").html(make_skeleton());
          		
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
