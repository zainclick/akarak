<div class="col-lg-1 col-md-4">
							<div class="dashboard-navbar">

								<div class="d-user-avater">
								<?php 
								if(auth()->user()->logo){ ?>

									<img src="{{auth()->user()->getUserAvatar()}}" class="img-fluid avater" alt="">

								<?php }else{ ?>

									<img src="/images/default/avatar.png" class="img-fluid avater" alt="">

									
								<?php }
								?>
									<span><?php if(app()->getLocale() == 'ar'){echo auth()->user()->name_ar;}else{echo auth()->user()->name_en;} ?></span>
									<!-- <span>{{$agency->email}}</span> -->
								</div>
								
								<div class="d-navigation">
									<ul>
										<li class="active"><a href="dashboard.html"><i class="ti-user"></i> <span>{{__('agencies/dashboard.profile')}}</span> </a></li>
										<li><a href="bookmark-list.html"><i class="ti-bookmark"></i> <span>{{__('agencies/dashboard.bookmarked')}} </span></a></li>
										<li><a href="my-property.html"><i class="ti-layers"></i> <span>{{__('agencies/dashboard.properties')}} </span></a></li>
										<li><a href="submit-property-dashboard.html"><i class="ti-pencil-alt"></i> <span>{{__('agencies/dashboard.new_property')}} </span></a></li>
										<li><a href="{{route('agency-agents')}}"><i class="ti-user"></i> <span>{{__('agencies/dashboard.agents')}} </span></a></li>
                                        <li><a href="{{route('agency-agents')}}"><i class="ti-user"></i> <span>{{__('agencies/dashboard.new_agent')}} </span></a></li>

										<li><a href="submit-property-dashboard.html"><i class="ti-user"></i> <span>{{__('agencies/dashboard.client')}} </span></a></li>

										<li><a href="change-password.html"><i class="ti-unlock"></i><span>Change Password</span></a></li>
										<li><a href="{{route('agency-logout')}}"><i class="ti-power-off"></i><span>{{__('agencies/dashboard.log_out')}}</span></a></li>
									</ul>
								</div>
								
							</div>
						</div>