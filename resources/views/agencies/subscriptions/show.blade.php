@extends('layouts.front.master')
@section('title')
    {{__('home.title')}}
@endsection
@section('content')

					<!-- ============================ Agency Name Start================================== -->
			<div class="agent-page">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="agency agency-list shadow-0 mt-2 mb-2">
							
								<a href="agency-page.html" class="agency-avatar">
									<img src="/front/assets/img/user-5.jpg" alt="">
								</a>
								
								<div class="agency-content">
									<div class="agency-name">
										<h4><a href="agency-page.html"><?php if(app()->getLocale() == 'ar'){echo $agent->name_ar;}else{echo $agent->name_en;} ?></a></h4>
										<span><i class="lni-map-marker"></i><?php if(app()->getLocale() == 'ar'){echo $agent->city_fk->name_ar;}else{echo $agent->city_fk->name_en;} ?></span>
									</div>
									
									<div class="agency-desc">
									<p><?php if(app()->getLocale() == 'ar'){echo $agent->bio_ar;}else{echo $agent->bio_en;} ?></p>
									</div>
									
									<ul class="agency-detail-info">
										<li><i class="lni-phone-handset"></i>{{$agent->mobile}}</li>
										<li><i class="lni-envelope"></i><a href="#">{{$agent->email}}</a></li>
									</ul>
									
									<ul class="social-icons">
										<li><a class="facebook" href="#"><i class="lni-facebook"></i></a></li>
										<li><a class="twitter" href="#"><i class="lni-twitter"></i></a></li>
										<li><a class="linkedin" href="#"><i class="lni-instagram"></i></a></li>
										<li><a class="linkedin" href="#"><i class="lni-linkedin"></i></a></li>
									</ul>
									<div class="clearfix"></div>
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
						<div class="col-lg-8 col-md-12 col-sm-12">
							
							<!-- Single Block Wrap -->
							<div class="block-wrap">
								
								<div class="block-header">
									<h4 class="block-title">Agent Info</h4>
								</div>
								
								<div class="block-body">
									<ul class="dw-proprty-info">
										<li><strong>Ceo</strong><?php if(app()->getLocale() == 'ar'){echo $agent->name_ar;}else{echo $agent->name_en;} ?></li>
										<li><strong>Email</strong>{{$agent->email}}</li>
										<li><strong>Phone</strong>{{$agent->mobile}}</li>
										<li><strong>Facebook</strong>{{$agent->facebook}}</li>
										<li><strong>Address</strong><?php if(app()->getLocale() == 'ar'){echo $agent->city_fk->name_ar;}else{echo $agent->city_fk->name_en;} ?></li>
										<li><strong>City</strong><?php if(app()->getLocale() == 'ar'){echo $agent->city_fk->name_ar;}else{echo $agent->city_fk->name_en;} ?></li>
										<li><strong>Country</strong>{{$agent->country_fk->name}}</li>
										<li><strong>Stab.</strong>{{$agent->since}}</li>
									</ul>
								</div>
								
							</div>
							
							<!-- Single Block Wrap -->
							<div class="block-wraps">
								
								<div class="block-header">
									<ul class="nav nav-tabs customize-tab" id="myTab" role="tablist">
									  <li class="nav-item">
										<a class="nav-link active" id="rental-tab" data-toggle="tab" href="#rental" role="tab" aria-controls="rental" aria-selected="true">Rental</a>
									  </li>
									  <li class="nav-item">
										<a class="nav-link" id="sale-tab" data-toggle="tab" href="#sale" role="tab" aria-controls="sale" aria-selected="false">For Sale</a>
									  </li>
									</ul>
								</div>
								
								<div class="block-body">
									<div class="tab-content" id="myTabContent">
									
										<div class="tab-pane fade show active" id="rental" role="tabpanel" aria-labelledby="rental-tab">
											<!-- row -->
											<div class="row">
												<div class="col-lg-12 col-md-12 col-sm-12 list-layout">
													
													<!-- Single Listings -->
													<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="single-property-2.html">
																<img src="assets/img/p-1.jpg" class="img-fluid mx-auto" alt="" />
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
															<span class="property-type">For Rent</span>
														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="single-property-2.html">Resort Valley Ocs</a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>3848 Swick Hill, New Orleans</span>
																</div>
																<div class="list-author">
																	<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li><strong>Bed:</strong>2</li>
																	<li><strong>Bath:</strong>1</li>
																	<li><strong>Sqft:</strong>3,700</li>
																</ul>
															</div>
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<h4 class="list-pr">$632,580</h4>
																</div>
																<div class="listing-detail-btn">
																	<a href="single-property-2.html" class="more-btn">More Info</a>
																</div>
															</div>
															
														</div>
														
													</div>
													<!-- End Single Listings -->
													
													<!-- Single Listings -->
													<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="single-property-2.html">
																<img src="assets/img/p-2.jpg" class="img-fluid mx-auto" alt="" />
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
															<span class="property-type">For Rent</span>
														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="single-property-2.html">New Clue Apartment</a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>127, Quice Market, New York</span>
																</div>
																<div class="list-author">
																	<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li><strong>Bed:</strong>2</li>
																	<li><strong>Bath:</strong>2</li>
																	<li><strong>Sqft:</strong>2,900</li>
																</ul>
															</div>
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<h4 class="list-pr">$3,570</h4>
																</div>
																<div class="listing-detail-btn">
																	<a href="single-property-2.html" class="more-btn">More Info</a>
																</div>
															</div>
															
														</div>
														
													</div>
													<!-- End Single Listings -->
									
													<!-- Single Listings -->
													<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="single-property-2.html">
																<img src="assets/img/p-3.jpg" class="img-fluid mx-auto" alt="" />
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
															<span class="property-type">For Rent</span>
														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="single-property-2.html">Luxury Home in Manhattan</a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>588 Oakmound Road, Chicago</span>
																</div>
																<div class="list-author">
																	<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li><strong>Bed:</strong>3</li>
																	<li><strong>Bath:</strong>2</li>
																	<li><strong>Sqft:</strong>2,400</li>
																</ul>
															</div>
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<h4 class="list-pr">$182,880</h4>
																</div>
																<div class="listing-detail-btn">
																	<a href="single-property-2.html" class="more-btn">More Info</a>
																</div>
															</div>
															
														</div>
														
													</div>
													<!-- End Single Listings -->
									
													<!-- Single Listings -->
													<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="single-property-2.html">
																<img src="assets/img/p-4.jpg" class="img-fluid mx-auto" alt="" />
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
															<span class="property-type">For Rent</span>
														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="single-property-2.html">Energy Certificate for EU</a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>425 Amethyst Drive, North Adams</span>
																</div>
																<div class="list-author">
																	<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li><strong>Bed:</strong>2</li>
																	<li><strong>Bath:</strong>2</li>
																	<li><strong>Sqft:</strong>2,400</li>
																</ul>
															</div>
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<h4 class="list-pr">$2,680</h4>
																</div>
																<div class="listing-detail-btn">
																	<a href="single-property-2.html" class="more-btn">More Info</a>
																</div>
															</div>
															
														</div>
														
													</div>
													<!-- End Single Listings -->
									
													<!-- Single Listings -->
													<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="single-property-2.html">
																<img src="assets/img/p-5.jpg" class="img-fluid mx-auto" alt="" />
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
															<span class="property-type">For Rent</span>
														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="single-property-2.html">Office Space New York</a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>4192 Caynor Circle, Summit</span>
																</div>
																<div class="list-author">
																	<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li><strong>Bed:</strong>2</li>
																	<li><strong>Bath:</strong>2</li>
																	<li><strong>Sqft:</strong>2,700</li>
																</ul>
															</div>
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<h4 class="list-pr">$2,580</h4>
																</div>
																<div class="listing-detail-btn">
																	<a href="single-property-2.html" class="more-btn">More Info</a>
																</div>
															</div>
															
														</div>
														
													</div>
													<!-- End Single Listings -->
									
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
													
													<!-- Single Listings -->
													<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="single-property-2.html">
																<img src="assets/img/p-1.jpg" class="img-fluid mx-auto" alt="" />
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
															<span class="property-type">For Sale</span>
														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="single-property-2.html">Resort Valley Ocs</a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>3848 Swick Hill, New Orleans</span>
																</div>
																<div class="list-author">
																	<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li><strong>Bed:</strong>2</li>
																	<li><strong>Bath:</strong>1</li>
																	<li><strong>Sqft:</strong>3,700</li>
																</ul>
															</div>
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<h4 class="list-pr">$632,580</h4>
																</div>
																<div class="listing-detail-btn">
																	<a href="single-property-2.html" class="more-btn">More Info</a>
																</div>
															</div>
															
														</div>
														
													</div>
													<!-- End Single Listings -->
													
													<!-- Single Listings -->
													<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="single-property-2.html">
																<img src="assets/img/p-2.jpg" class="img-fluid mx-auto" alt="" />
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
															<span class="property-type">For Sale</span>
														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="single-property-2.html">New Clue Apartment</a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>127, Quice Market, New York</span>
																</div>
																<div class="list-author">
																	<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li><strong>Bed:</strong>2</li>
																	<li><strong>Bath:</strong>2</li>
																	<li><strong>Sqft:</strong>2,900</li>
																</ul>
															</div>
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<h4 class="list-pr">$3,570</h4>
																</div>
																<div class="listing-detail-btn">
																	<a href="single-property-2.html" class="more-btn">More Info</a>
																</div>
															</div>
															
														</div>
														
													</div>
													<!-- End Single Listings -->
									
													<!-- Single Listings -->
													<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="single-property-2.html">
																<img src="assets/img/p-3.jpg" class="img-fluid mx-auto" alt="" />
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
															<span class="property-type">For Sale</span>
														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="single-property-2.html">Luxury Home in Manhattan</a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>588 Oakmound Road, Chicago</span>
																</div>
																<div class="list-author">
																	<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li><strong>Bed:</strong>3</li>
																	<li><strong>Bath:</strong>2</li>
																	<li><strong>Sqft:</strong>2,400</li>
																</ul>
															</div>
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<h4 class="list-pr">$182,880</h4>
																</div>
																<div class="listing-detail-btn">
																	<a href="single-property-2.html" class="more-btn">More Info</a>
																</div>
															</div>
															
														</div>
														
													</div>
													<!-- End Single Listings -->
									
													<!-- Single Listings -->
													<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="single-property-2.html">
																<img src="assets/img/p-4.jpg" class="img-fluid mx-auto" alt="" />
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
															<span class="property-type">For Sale</span>
														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="single-property-2.html">Energy Certificate for EU</a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>425 Amethyst Drive, North Adams</span>
																</div>
																<div class="list-author">
																	<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li><strong>Bed:</strong>2</li>
																	<li><strong>Bath:</strong>2</li>
																	<li><strong>Sqft:</strong>2,400</li>
																</ul>
															</div>
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<h4 class="list-pr">$2,680</h4>
																</div>
																<div class="listing-detail-btn">
																	<a href="single-property-2.html" class="more-btn">More Info</a>
																</div>
															</div>
															
														</div>
														
													</div>
													<!-- End Single Listings -->
									
													<!-- Single Listings -->
													<div class="property-listing property-1">
											
														<div class="listing-img-wrapper">
															<a href="single-property-2.html">
																<img src="assets/img/p-5.jpg" class="img-fluid mx-auto" alt="" />
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
															<span class="property-type">For Sale</span>
														</div>
														
														<div class="listing-content">
														
															<div class="listing-detail-wrapper">
																<div class="listing-short-detail">
																	<h4 class="listing-name"><a href="single-property-2.html">Office Space New York</a></h4>
																	<span class="listing-location"><i class="ti-location-pin"></i>4192 Caynor Circle, Summit</span>
																</div>
																<div class="list-author">
																	<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
																</div>
															</div>
														
															<div class="listing-features-info">
																<ul>
																	<li><strong>Bed:</strong>2</li>
																	<li><strong>Bath:</strong>2</li>
																	<li><strong>Sqft:</strong>2,700</li>
																</ul>
															</div>
														
															<div class="listing-footer-wrapper">
																<div class="listing-price">
																	<h4 class="list-pr">$2,580</h4>
																</div>
																<div class="listing-detail-btn">
																	<a href="single-property-2.html" class="more-btn">More Info</a>
																</div>
															</div>
															
														</div>
														
													</div>
													<!-- End Single Listings -->
									
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
								
								<!-- Featured Property -->
								<div class="sidebar-widgets">
									
									<h4>Featured Property</h4>
									
									<div class="sidebar-property-slide">
										
										<!-- Single Property -->
										<div class="single-items">
											<div class="property-listing property-1">
									
												<div class="listing-img-wrapper">
													<a href="single-property-2.html">
														<img src="assets/img/p-1.jpg" class="img-fluid mx-auto" alt="" />
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
													<span class="property-type">For Sale</span>
												</div>
												
												<div class="listing-content">
												
													<div class="listing-detail-wrapper">
														<div class="listing-short-detail">
															<h4 class="listing-name"><a href="single-property-2.html">Resort Valley Ocs</a></h4>
															<span class="listing-location"><i class="ti-location-pin"></i>3848 Swick Hill, New Orleans</span>
														</div>
														<div class="list-author">
															<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
														</div>
													</div>
												
													<div class="listing-features-info">
														<ul>
															<li><strong>Bed:</strong>2</li>
															<li><strong>Bath:</strong>1</li>
															<li><strong>Sqft:</strong>3,700</li>
														</ul>
													</div>
												
													<div class="listing-footer-wrapper">
														<div class="listing-price">
															<h4 class="list-pr">$632,580</h4>
														</div>
														<div class="listing-detail-btn">
															<a href="single-property-2.html" class="more-btn">More Info</a>
														</div>
													</div>
													
												</div>
												
											</div>
										</div>
										
										<!-- Single Property -->
										<div class="single-items">
											<div class="property-listing property-1">
									
												<div class="listing-img-wrapper">
													<a href="single-property-2.html">
														<img src="assets/img/p-2.jpg" class="img-fluid mx-auto" alt="" />
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
													<span class="property-type">For Rent</span>
												</div>
												
												<div class="listing-content">
												
													<div class="listing-detail-wrapper">
														<div class="listing-short-detail">
															<h4 class="listing-name"><a href="single-property-2.html">New Clue Apartment</a></h4>
															<span class="listing-location"><i class="ti-location-pin"></i>127, Quice Market, New York</span>
														</div>
														<div class="list-author">
															<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
														</div>
													</div>
												
													<div class="listing-features-info">
														<ul>
															<li><strong>Bed:</strong>2</li>
															<li><strong>Bath:</strong>2</li>
															<li><strong>Sqft:</strong>2,900</li>
														</ul>
													</div>
												
													<div class="listing-footer-wrapper">
														<div class="listing-price">
															<h4 class="list-pr">$3,570</h4>
														</div>
														<div class="listing-detail-btn">
															<a href="single-property-2.html" class="more-btn">More Info</a>
														</div>
													</div>
													
												</div>
												
											</div>
										</div>
										
										<!-- Single Property -->
										<div class="single-items">
											<div class="property-listing property-1">
									
												<div class="listing-img-wrapper">
													<a href="single-property-2.html">
														<img src="assets/img/p-3.jpg" class="img-fluid mx-auto" alt="" />
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
													<span class="property-type">For Sale</span>
												</div>
												
												<div class="listing-content">
												
													<div class="listing-detail-wrapper">
														<div class="listing-short-detail">
															<h4 class="listing-name"><a href="single-property-2.html">Luxury Home in Manhattan</a></h4>
															<span class="listing-location"><i class="ti-location-pin"></i>588 Oakmound Road, Chicago</span>
														</div>
														<div class="list-author">
															<a href="#"><img src="assets/img/add-user.png" class="img-fluid img-circle avater-30" alt=""></a>
														</div>
													</div>
												
													<div class="listing-features-info">
														<ul>
															<li><strong>Bed:</strong>3</li>
															<li><strong>Bath:</strong>2</li>
															<li><strong>Sqft:</strong>2,400</li>
														</ul>
													</div>
												
													<div class="listing-footer-wrapper">
														<div class="listing-price">
															<h4 class="list-pr">$182,880</h4>
														</div>
														<div class="listing-detail-btn">
															<a href="single-property-2.html" class="more-btn">More Info</a>
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
				</div>	
			</section>
			<!-- ============================ About Agency End ================================== -->
	
@endsection
