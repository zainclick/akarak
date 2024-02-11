@php
    $title_page=__('admin/titles/create.title');
@endphp
@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
		<!-- breadcrumb -->
		<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => __('admin/main.dashboard') , 'isactive' => false],
			['url' => route('admin.titles.index') , 'title' => __('admin/titles/index.title') , 'isactive' => false],
			['url' => '#' , 'title' =>  __('admin/titles/create.title'), 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 ">
	 
		
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.titles.store')}}">
		@csrf

		<div class="col-12 col-lg-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span>	{{__('admin/titles/create.title')}}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/titles/create.name_ar')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name_ar" required minlength="3"  maxlength="190" class="form-control" value="{{old('name_ar')}}" >
				</div>
			</div>
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/titles/create.name_en')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name_en" required class="form-control"  value="{{old('name_en')}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/titles/create.status')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control" required name="status">
						<option @if(old('status')=="0") selected @endif value="0">{{__('admin/main.active')}}</option>
						<option @if(old('status')=="1") selected @endif value="1">{{__('admin/main.dis_active')}}</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/titles/create.slug')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="slug" required minlength="3"  maxlength="190" class="form-control" value="{{old('slug')}}" >
				</div>
			</div>
		

	
			</div>
 
		</div>
		 
		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">حفظ</button>
		</div> 
		</form>
	</div>
</div>
@endsection