@extends('layouts.front.master')
@section('title')
    {{__('front/agencies/index.title')}}
@endsection
@section('content')

			<!-- ============================ Start Filter search ================================== -->
			@include('front.agencies.filter-agencies')
			<!-- ============================ End Filter search ================================== -->
			
			<!-- ============================ Agency List Start ================================== -->
			<section>
			
				<div class="container">
				
					<section class="theme-bg call-to-act-wrap" style="margin-bottom: 50px;border-radius: 10px;background: #e3e1f2;">
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
									
									<div class="call-to-act">
										<div class="call-to-act-head">
											<h3 style="color: #443e3e;margin-bottom: 5px;font-weight: bold;">Find The Best Agencies</h3>
											<span style="color: #1e1919;">The most responsive Agencies with up-to-date and improved accuracy on the properties you are searching for.</span>
										</div>
										<a href="#" class="btn btn-call-to-act">Learn more</a>
									</div>
									
								</div>
							</div>
						</div>
					</section>

				<div class="row put-search-agency">
						
						
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
											<li class="listing-card-info-icon"><strong>SuperAgents:</strong>{{$agency->super_agent_fk->count()}}</li>
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
					
											
					<!-- Pagination -->
							<div class="row">
								<div class="col-12 p-3">
									{{$agencies->appends(request()->query())->render()}}
								</div>
							</div>
					
				</div>
						
			</section>
			<!-- ============================ Agency List End ================================== -->

@endsection

@section('scripts')

<script>
$(document).on('change','.search-agency',function(e){
    e.preventDefault();
    var Form = $(this).serialize();
    $.ajax({
        type:'GET',
        url:'{{route('front-agency-search')}}',
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
					
        $(".put-search-agency").html(make_skeleton());
          		
		},
        success:function(data) {  
			setTimeout(function(){   
        		$(".put-search-agency").html(data);
			},1000)
        }
             
        })
              
        }); 

</script>

@endsection