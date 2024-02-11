@php
    $title_page=__('agencies/properties/index.title');
@endphp
@extends('layouts.agency')
@section('content')
<div class="col-12 p-3">
	<!-- breadcrumb -->
	<x-bread-crumb :breads="[
			['url' => url('/agency') , 'title' => __('main.dashboard') , 'isactive' => false],
			['url' => route('agency-properties') , 'title' => __('agencies/properties/index.title') , 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 main-box">
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-users"></span>	{{__('agencies/properties/index.title')}}
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end" style="<?php if(app()->getLocale() == 'en'){echo 'text-align:right !important';} ?>">
					<a href="{{route('agency-properties-create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> {{__('main.create')}} </span>
					</a>
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="{{__('main.search')}}" value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-height: 600px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>{{__('agencies/properties/index.property_name')}}</th>
						<th>{{__('agencies/properties/index.agency')}}</th>
						<th>{{__('agencies/properties/index.agent')}}</th>
						<th>{{__('main.status')}}</th>
						<th>{{__('main.control')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($properties as $property)
					<tr>
						<td>{{$property->id}}</td>
						<td>
						<?php if(app()->getLocale() == 'ar'){echo $property->title_ar;}else{echo $property->title_en;} ?>
						</td>
						<td><?php if(app()->getLocale() == 'ar'){echo $property->agency_fk->name_ar;}else{echo $property->agency_fk->name_en;} ?></td>
						<td><?php if(app()->getLocale() == 'ar'){echo $property->agent_fk->name_ar;}else{echo $property->agent_fk->name_en;} ?></td>
						<td>
						<?php 
						if($property->status == 0){
							echo __('admin/main.active');
						}else{
							echo __('admin/main.dis_active');
						}
						?>
						</td>
						 

						<td>
							<a href="{{route('admin.properties.show',$property)}}">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="fas fa-search "></span> {{__('main.show')}}
							</span>
							</a>

							
			
				
							
							<a href="{{route('admin.properties.edit',$property)}}">
							<span class="btn  btn-outline-success btn-sm font-small mx-1">
								<span class="fas fa-wrench "></span> {{__('main.edit')}}
							</span>
							</a>
							
						 						 
							<form method="POST" action="{{route('admin.properties.destroy',$property)}}" class="d-inline-block">@csrf @method("DELETE")
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
									if($property->property_features_fk->count() > 0){ ?>
										<li><a class="dropdown-item font-1" href="{{route('admin.remove.property.features',$property)}}"><span class="fal fa-trash"></span> {{__('admin/properties/index.remove_features')}}</a></li>

									<?php }else{ ?>
										<li><a class="dropdown-item font-1" href="{{route('admin.add.property.features',$property)}}"><span class="fal fa-plus"></span> {{__('admin/properties/index.add_features')}}</a></li>

									<?php }?>
							
						
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
			{{$properties->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
