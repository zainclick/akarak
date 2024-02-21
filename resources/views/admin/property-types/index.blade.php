@php
    $title_page=__('admin/types/index.title');
@endphp
@extends('layouts.admin')

@section('content')
<div class="col-12 p-3">
	<!-- breadcrumb -->
	
	<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' =>  __('admin/main.dashboard') , 'isactive' => false],
			['url' => route('admin.property-types.index') , 'title' => __('admin/types/index.title') , 'isactive' => true],
		]" >
		
	</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 main-box">
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-users"></span>	{{__('admin/types/index.title')}}
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@can('users-create')
					<a href="{{route('admin.property-types.create')}}" style="<?php if(app()->getLocale() == 'en'){echo 'float: right;';} ?>">
					<span class="btn btn-primary"><span class="fas fa-plus"></span>{{__('admin/main.add_new')}}</span>
					</a>
					@endcan
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... " value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-height: 600px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>{{__('admin/types/index.name')}}</th>
						<th>{{__('admin/types/index.status')}}</th>
						<th>{{__('admin/main.control')}}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($types as $type)
					<tr>
						<td>{{$type->id}}</td>
						<td>
						<?php if(app()->getLocale() == 'ar'){echo $type->name_ar;}else{echo $type->name_en;}  ?>
						</td>
						<td>
						<?php
						 if($type->status == 0){
							echo __('admin/main.active');
						 }else{
							echo __('admin/main.dis_active');
						 }
						
						?>
						</td>

						 
						<td>
							@can('users-read')
							<a href="{{route('admin.property-types.show',$type)}}">
							<span class="btn  btn-outline-primary btn-sm font-small mx-1">
								<span class="fas fa-search "></span> عرض
							</span>
							</a>
							@endcan

							
							


							
							@can('users-update')
							<a href="{{route('admin.property-types.edit',$type)}}">
							<span class="btn  btn-outline-success btn-sm font-small mx-1">
								<span class="fas fa-wrench "></span> تحكم
							</span>
							</a>
							@endcan
							
						 						 
							@can('users-delete')
							<form method="POST" action="{{route('admin.property-types.destroy',$type)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-small mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> حذف
								</button>
							</form>
							@endcan



						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$types->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
