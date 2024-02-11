					@foreach ($agencies as $agency)
					<?php 
						$rent = App\Models\Backend\Properties::where(['agency'=>$agency->id,'property_status' => 1,'activity_status'=>0])->get();
						$sale = App\Models\Backend\Properties::where(['agency'=>$agency->id,'property_status' => 2,'activity_status'=>0])->get();

					?>
						<div class="col-lg-6 col-md-12">

							<!-- Single Agency -->
							<div class="agency agency-list">
							
								<a href="{{route('front-agencies-show',$agency->slug)}}" class="agency-avatar">
									<img src="{{$agency->main_image()}}" alt="">
								</a>
								
								<div class="agency-content">
									<div class="agency-name">
										<h4><a href="{{route('front-agencies-show',$agency->slug)}}"><?php if(app()->getLocale() == 'ar'){echo substr($agency->name_ar,0,20);}else{echo substr($agency->name_en,0,20);} ?></a></h4>
										<span><i class="lni-map-marker"></i>{{substr($agency->address,0,20);}}</span>
									</div>
									
									<ul class="agency-detail-info">
										<li><i class="lni-phone-handset"></i>{{$agency->mobile}}</li>
									</ul>
									<div class="listing-features-info">
										<ul>
											<li class="listing-card-info-icon"><strong>Agents:</strong>{{$agency->agent_fk->count()}}</li>
											<li class="listing-card-info-icon"><strong>SuperAgents:</strong>3</li>
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