           <div class="top-header">
				<div class="container">
					<div class="row">
					
						<div class="col-lg-6 col-md-6">
							<div class="cn-info">
								<ul>
									<li><i class="lni-phone-handset"></i>(+971) 507012062</li>
									<li><i class="ti-email"></i>support@akarak.ae</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<ul class="top-social">
								<li><a href="#"><i class="lni-facebook"></i></a></li>
								<li><a href="#"><i class="lni-linkedin"></i></a></li>
								<li><a href="#"><i class="lni-instagram"></i></a></li>
								<li><a href="#"><i class="lni-twitter"></i></a></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		    <!-- Start Navigation -->
<div class="header header-light">
				<div class="container">
					<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="#">
								<img src="/front/assets/img/logo_en.png" class="logo" alt="">
							</a>
							<div class="nav-toggle"></div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;"><span class="nav-menus-wrapper-close-button">✕</span>
							<ul class="nav-menu">
							
								<li class="active"><a href="/">{{__('navigation.home')}}<span class="submenu-indicator"></span><span class="submenu-indicator"></span></a></li>
								<li class=""><a href="{{route('front-properties')}}">{{__('navigation.properties')}}<span class="submenu-indicator"></span><span class="submenu-indicator"></span></a></li>
								<li class=""><a href="{{route('front-agencies')}}">{{__('navigation.agencies')}}<span class="submenu-indicator"></span><span class="submenu-indicator"></span></a></li>
								<li class=""><a href="{{route('front-agents')}}">{{__('navigation.agents')}}<span class="submenu-indicator"></span><span class="submenu-indicator"></span></a></li>

								
								<li><a href="JavaScript:Void(0);">{{__('navigation.pages')}}<span class="submenu-indicator"></span><span class="submenu-indicator"></span></a>
									<ul class="nav-dropdown nav-submenu" style="right: auto;">
									
										<li><a href="{{route('front-pricing')}}">{{__('navigation.packages')}}</a></li> 
										<li><a href="{{route('front-pricing')}}">{{__('navigation.about')}}</a></li>                                    
										<li><a href="{{route('front-properties-show',1)}}">{{__('navigation.contact')}}</a></li>                                    
										<li><a href="{{route('front-agencies')}}">{{__('navigation.faqs')}}</a></li> 
									
									</ul>
								</li>

								<li class=""><a href="{{route('blog')}}">{{__('navigation.blogs')}}<span class="submenu-indicator"></span><span class="submenu-indicator"></span></a></li>

								<?php
								if(!auth('web')->check() && !auth('agent')->check() && !auth('agency')->check() && !auth('front-user')->check()){ ?>
									
									<li class=""><a href="JavaScript:Void(0);" data-toggle="modal" data-target="#signup">{{__('navigation.signup')}}</a></li>

								<?php }
								 ?>
								
							</ul>
						<ul class="nav-menu nav-menu-social align-to-right">

							
							
								<li>
								<i class="fas fa-language mr-1"></i>
								<?php 
								if(app()->getLocale() == 'ar'){
									$lang = 'en';

								}else{
									$lang = 'ar';
								}

								$localeCode = $lang;
								?>
							<li>
								<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
									
								<?php 
								if(app()->getLocale() == 'ar'){
									echo 'English';

								}else{
									echo  'عربي';
								}

								
								?>	
								</a>
							</li>
								
								</li>

								<li>
									<a href="#">
									<i class="fas fa-heart mr-1"></i>								
								
								</a>
								</li>
							<?php if(auth('web')->check() || auth('agent')->check() || auth('agency')->check() || auth('front-user')->check()){ ?>
								<li>
									<a 
									href="
									<?php 
									if(auth('agent')->check()){
										echo route('agent-logout');
									}elseif(auth('agency')->check()){
										echo route('agency-logout');
									}elseif(auth('front-user')->check()){
										echo route('user-logout');
									}else{
										echo route('logout');
									}
									?>
									
									">
									<i class="fas fa-sign-out-alt font-1"></i>								
									{{__('navigation.logout')}}
								</a>
								</li>
							<?php } ?>
							
						<?php if(!auth('web')->check() && !auth('agent')->check() && !auth('agency')->check() && !auth('front-user')->check()){ ?>
							<ul class="nav-menu nav-menu-social align-to-right">
								
								<li class="">
									<a href="#" data-toggle="modal" data-target="#login">
										<i class="fas fa-user-circle mr-1"></i>Signin</a>
								</li>
								
							</ul>

							<?php } ?>
							
															
							</ul>
						</div>
					</nav>
				</div>
			</div>

			<div class="clearfix"></div>
