			<div class="search-header-banner">
				<div class="hero-search" style="text-align: center;">
					<h1 style="color: #fff !important;">{{__('front/properties/index.search_your_dream')}}</h1>
				</div>
				<div class="container">
					<div class="full-search-2 transparent">
						
						<div class="hero-search-content">
						<form id="filter-search" >
						@csrf
							<div class="row">
							

								<div class="col-lg-3 col-md-4 col-sm-12">
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

									<div class="col-lg-3 col-md-4 col-sm-12">
										<div class="form-group">
											<div class="input-with-icon">
												<select id="pstatus" name="property_status" class="form-control">
													<option value="">&nbsp;</option>
													<option value="1">Any Status</option>
												@foreach ($statuses as $status)
													<option value="{{$status->id}}"><?php if(app()->getLocale() == 'ar'){echo $status->name_ar;}else{echo $status->name_en;} ?></option>
												@endforeach
													
												</select>
												<i class="ti-briefcase"></i>
											</div>
										</div>
									</div>
								
								<div class="col-lg-2 col-md-4 col-sm-12">
									<div class="form-group">
										<div class="input-with-icon">
											<select id="cities" name="city" class="form-control">
											<option value="">&nbsp;</option>
											@foreach ($citys as $city)
												<option value="{{$city->id}}"><?php if(app()->getLocale() == 'ar'){echo $city->name_ar;}else{echo $city->name_en;} ?></option>
											@endforeach
												
											</select>
											<i class="ti-briefcase"></i>
										</div>
									</div>
								</div>

								<div class="col-lg-2 col-md-4 col-sm-12">
									<div class="form-group">
										<div class="input-with-icon">
											<select id="sort" name="sort" class="form-control">
											<option value="">&nbsp;</option>
												<option value="ASC">{{__('front/properties/index.asc')}}</option>
												<option value="DESC">{{__('front/properties/index.desc')}}</option>
											</select>
											
											<i class="ti-briefcase"></i>
										</div>
									</div>
								</div>
								<div class="col-lg-1 col-md-1 col-sm-12 small-padd">
									<div class="form-group">
										<a style="-webkit-box-shadow: 0 0 6px 1px rgba(62,28,131,0.1);" role="button" class="ad-search collapsed" data-toggle="collapse" href="#advance-search" aria-expanded="false" aria-controls="advance-search"><i class="ti-align-center"></i></a>
									</div>
								</div>

								<div class="col-lg-1 col-md-2 col-sm-12 small-padd">
									<div class="form-group" >
										<input style="background-color: #fd5332;color: #fff;height: 62px;border-radius: 10px;" type="submit" value="Find" name="search" class="btn search-btn-outline">
									</div>
								</div>


								
							</div>
							
							<div class="collapse" id="advance-search" aria-expanded="false" role="banner">
							
								
								<div class="row">
								
									<div class="col-lg-4 col-md-4 col-sm-12">
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
									
									<div class="col-lg-4 col-md-4 col-sm-12">
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

									<div class="col-lg-12 col-md-12 col-sm-12">
										<h4>{{__('front/properties/index.features')}}</h4>
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
								
							</div>
							
						
							
							</form>
							
						</div>
					</div>
				</div>
			</div>