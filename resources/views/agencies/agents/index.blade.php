@php
    $title_page=__('agencies/agents/index.title');
@endphp
@extends('layouts.agency')
@section('content')
<div class="col-12 p-3">
	<!-- breadcrumb -->
	<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => __('agencies/agents/index.dashboard') , 'isactive' => false],
			['url' => route('admin.agents.index') , 'title' => __('agencies/agents/index.title') , 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 main-box">
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-users"></span>	{{__('agencies/agents/index.title')}}
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end" style="<?php if(app()->getLocale() == 'en'){echo "text-align: right !important;";} ?>">
					<a href="{{route('agency-agents-create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> {{__('main.create')}} </span>
					</a>
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="{{__('agencies/agents/index.search')}}" value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-height: 600px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>{{__('agencies/agents/index.agent_name')}}</th>
						<th>{{__('agencies/agents/index.agency')}}</th>
						<th>{{__('agencies/agents/index.status')}}</th>
						<th>{{__('main.control')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($agents as $agent)
					<tr>
						<td>{{$agent->id}}</td>
						<td>
						<?php if(app()->getLocale() == 'ar'){echo $agent->name_ar;}else{echo $agent->name_en;} ?>
						</td>
						<td><?php if(app()->getLocale() == 'ar'){echo $agent->agency_fk->name_ar;}else{echo $agent->agency_fk->name_en;} ?></td>
						<td>
						<?php 
						if($agent->status == 0){
							echo __('main.active');
						}else{
							echo __('main.dis_active');
						}
						?>
						</td>
						 

						<td>
							<a target="_blank" href="{{route('front-agents-show',$agent)}}">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="fas fa-search "></span> {{__('main.show')}}
							</span>
							</a>

							
			
				
							
							<a href="{{route('agency-agents-edit',$agent)}}">
							<span class="btn  btn-outline-success btn-sm font-small mx-1">
								<span class="fas fa-wrench "></span> {{__('main.edit')}}
							</span>
							</a>
							
						 						 
							<form method="POST" action="{{route('agency-agents-delete',$agent)}}" class="d-inline-block delete-custome">
							@csrf 
							@method('POST')
								<input type="hidden" name="slug" value="{{$agent->slug}}">
								<button class="btn  btn-outline-danger btn-sm font-small mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> {{__('main.delete')}}
								</button>
							</form>


							<div class="dropdown d-inline-block">
								<button class="py-1 px-2 btn btn-outline-primary font-small" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="true">
								<span class="fas fa-bars"></span>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 29px, 0px);">
									<?php 
										if($agent->agent_features_fk->count() > 0){ ?>
										<li><a class="dropdown-item font-1" href="{{route('remove.agent.features',$agent)}}"><span class="fal fa-trash"></span> {{__('main.remove_features')}}</a></li>

									<?php }else{ ?>
										<li><a class="dropdown-item font-1" href="{{route('add.agent.features',$agent)}}"><span class="fal fa-plus"></span> {{__('main.add_features')}}</a></li>

									<?php }		

										if($agent->agent_super_fk->count() > 0){ ?>
										<li><a class="dropdown-item font-1" href="{{route('remove.super.agent',$agent)}}"><span class="fal fa-trash"></span> {{__('main.remove_super_agent')}}</a></li>

									<?php }else{ ?>
										<li><a class="dropdown-item font-1" href="{{route('add.super.agent',$agent)}}"><span class="fal fa-plus"></span> {{__('main.add_super_agent')}}</a></li>

									<?php }
									if($agent->status == 0){ ?>

									<li><a class="dropdown-item font-1" href="{{route('agency-agents-blocked',$agent)}}"><span class="fal fa-trash"></span> {{__('main.block')}}</a></li>

									<?php }else{?>

									<li><a class="dropdown-item font-1" href="{{route('agency-agents-blocked',$agent)}}"><span class="fal fa-trash"></span> {{__('main.remove_block')}}</a></li>

									<?php }										

									?>
							
						
								</ul>
								</div>


						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$agents->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
