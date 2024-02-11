@extends('layouts.front.master')
@section('title')
    {{__('home.title')}}
@endsection
@section('content')

		<!-- ============================ Hero Banner  Start================================== -->
			<div class="image-cover hero-banner" style="background: #f3f3f3;margin-top: -60px;">
				<div class="container">
                <form method="POST" action="{{route('agent-login-action')}}" >
                @csrf
                    <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12"></div>
                    <div class="col-lg-6 col-md-4 col-sm-12">
                    	<div class="hero-search-wrap">
						<div class="hero-search text-center">
							<h1>L<span class="theme-cl">o</span>gin</h1>
						</div>
						<div class="hero-search-content">
							
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<div class="input-with-icon">
											<input id="email" type="email" name="email" class="form-control" placeholder="Email">
										</div>
									</div>
								</div>
							</div>

                            <div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="form-group">
										<div class="input-with-icon">
											<input id="password" type="password" name="password" class="form-control" placeholder="Password">
										</div>
									</div>
								</div>

		                    <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group">
                                        <input class="form-check-input ms-2 me-0" type="checkbox" name="remember" id="remember" checked="" style="position:relative;height: 20px;width: 20px;cursor: pointer;">

                                        <label class="form-check-label" for="remember" style="position:relative;cursor: pointer;padding: 22px;">
                                            تذكرني
                                        </label>
                                </div>
                            </div>

							</div>
							
					
						</div>
						<div class="hero-search-action">
							<input class="btn search-btn" type="submit" value="تسجيل الدخول">
						</div>

                        <ul style="list-style:none;" class="p-0 m-0">
                            <li class="d-block"><a style="color: #2b4db9;font-weight: bold;" href="http://127.0.0.1:8000/register" class="naskh py-2 d-block" style="text-decoration: none!important;"><span class="fas fa-circle font-small"></span> لا أملك حساب بعد</a></li>
                            <li class="d-block"><a style="color: #2b4db9;font-weight: bold;" href="http://127.0.0.1:8000/password/reset" class="naskh py-2 d-block" style="text-decoration: none!important;"><span class="fas fa-circle font-small"></span> نسيت كلمة المرور</a></li>
                        </ul>

					</div>
                    </div>
				</div>

				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->


@endsection
