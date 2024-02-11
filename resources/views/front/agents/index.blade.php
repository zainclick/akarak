@extends('layouts.front.master')
@section('title')
    {{__('front/agents/index.title')}}
@endsection
@section('content')

			<!-- ============================ Start Filter search ================================== -->
			@include('front.agents.filter-agents')
			<!-- ============================ End Filter search ================================== -->
			
			<!-- ============================ Agent List Start ================================== -->
			<section>
			
				<div class="container">

				<section class="theme-bg call-to-act-wrap" style="margin-bottom: 50px;border-radius: 10px;background: #e3e1f2;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							
							<div class="call-to-act">
								<div class="call-to-act-head">
									<h3 style="color: #443e3e;margin-bottom: 5px;font-weight: bold;">Find your SuperAgent</h3>
									<span style="color: #1e1919;">The most responsive agents with up-to-date and improved accuracy on the properties you are searching for.</span>
								</div>
								<a href="#" class="btn btn-call-to-act">Learn more</a>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			
					<div class="row put-search-agent">
						
					

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
						
						
					</div>
				</div>
						
			</section>
			<!-- ============================ Agent List End ================================== -->

@endsection

@section('scripts')

<script>
$(document).on('submit','.search-agent',function(e){
    e.preventDefault();
    var Form = $(this).serialize();
    $.ajax({
        type:'GET',
        url:'{{route('front-agent-search')}}',
        data: Form,
        contentType:false,
        processData:false,
		beforeSend: function() {
			
	function make_skeleton()
    {
      var output = '';
      for(var count = 0; count < 10; count++)
      {
        output += '<div class="col-lg-6 col-md-12 skeleton-ag">';
        output += '<div class="agency agency-list">';
        output += '<a class="agency-avatar"></a>';
        output += '<div class="agency-content">';
        output += '<div class="agency-name">';
        output += '<h4></h4>';
        output += '<span></span>';
        output += '</div>';
        output += '<ul class="agency-detail-info"></ul>';
        output += '<div class="listing-features-info">';
        output += '<ul>';
        output += '<li class="listing-card-info-icon"></li>';
        output += '<li class="listing-card-info-icon"></li>';
        output += '</ul>';
		output += '</div>';
		output += '<div class="listing-features-info">';
		output += '<ul>';
        output += '<li class="listing-card-info-icon"></li>';
        output += '<li class="listing-card-info-icon"></li>';
        output += '</ul>';
        output += '</div>';
        output += '<div class="clearfix"></div>';
        output += '</div>';
        output += '</div>';
        output += '</div>';

      }
      return output;
    }
					
        $(".put-search-agent").html(make_skeleton());


			/*
            $(".put-search-agent").html('<div class="loading-spinner"><i style="color: #fd5332;" class="fas fa-circle-notch fa-spin"></i></div>');
          	*/	
		},
        success:function(data) {  
			setTimeout(function(){   
        		$(".put-search-agent").html(data);
			},1000)
        }
             
        })
              
        }); 

</script>

@endsection