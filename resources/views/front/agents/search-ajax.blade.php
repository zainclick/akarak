				@foreach ($agents as $agent)
					<?php 
						$rent = App\Models\Backend\Properties::where(['agent'=>$agent->id,'property_status' => 1,'activity_status'=>0])->get();
						$sale = App\Models\Backend\Properties::where(['agent'=>$agent->id,'property_status' => 2,'activity_status'=>0])->get();

					?>
						<div class="col-lg-6 col-md-12">

							<!-- Single Agency -->
							<div class="agency agency-list">
							
								<a href="{{route('front-agents-show',$agent->slug)}}" class="agency-avatar" style="flex: 2;">
									<img src="{{$agent->main_image()}}" alt="">
								</a>
								
								<div class="agency-content">
									<div class="agency-name">
										<h4><a href="{{route('front-agents-show',$agent->slug)}}"><?php if(app()->getLocale() == 'ar'){echo substr($agent->name_ar,0,20);}else{echo substr($agent->name_en,0,20);} ?></a></h4>
										<span><i class="lni-map-marker"></i>{{substr($agent->address,0,20);}}</span>
									</div>

									<a class="a-agency" href="{{route('front-agencies-show',$agent->agency_fk->slug)}}">
										<img src="{{$agent->agency_fk->main_image()}}" class="d-inline-block">
									</a>
									
									<ul class="agency-detail-info">
										<li><?php if($agent->agent_super_fk->count() > 0){echo '<i class="lni-crown"></i> Super Agent';}else{echo 'Nationality: '.$agent->country_fk->name;} ?></li>
									</ul>
									<div class="listing-features-info">
										<ul>
											<li class="listing-card-info-icon"><strong>Languages:</strong>
											@foreach ($agent->language_fk as $language)
												<span>{{$language->language_fk->name_en}} | </span>
											@endforeach
											</li>
										</ul>
									</div>
									
								<div class="listing-features-info">
									<ul>
										<li class="listing-card-info-icon"><strong>For Rent:</strong>{{$rent->count()}}</li>
										<li class="listing-card-info-icon"><strong>For Sale:</strong>{{$sale->count()}}</li>
									</ul>
								</div>
									<div class="clearfix"></div>
								</div>
								
							</div>
						</div>

						@endforeach