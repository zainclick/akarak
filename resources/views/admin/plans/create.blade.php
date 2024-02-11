@php
    $title_page=__('admin/packages/create.title');
@endphp
@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
		<!-- breadcrumb -->
		<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => __('admin/main.dashboard') , 'isactive' => false],
			['url' => route('admin.packages.index') , 'title' => __('admin/packages/index.title') , 'isactive' => false],
			['url' => '#' , 'title' =>  __('admin/packages/create.title'), 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 ">
	 
		
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.plans.store')}}">
		@csrf

		<div class="col-12 col-lg-7 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span>	{{__('admin/packages/create.title')}}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/packages/create.name')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name" required minlength="3"  maxlength="190" class="form-control" value="{{old('name')}}" >
				</div>
			</div>
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/packages/create.price')}}
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="amount" required class="form-control"  value="{{old('price')}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/packages/create.status')}}
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
					{{__('admin/packages/create.slug')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="slug" required minlength="3"  maxlength="190" class="form-control" value="{{old('name')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Interval Count
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="interval_count" required minlength="3"  maxlength="190" class="form-control" value="{{old('interval_count',1)}}" >

				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					Billing Period
				</div>
				<div class="col-12 pt-3">
					<select class="form-control" required name="pilling_period">
						<option @if(old('pilling_period')=="month") selected @endif value="month">Monthly</option>
						<option @if(old('pilling_period')=="year") selected @endif value="year">Yearly</option>

					</select>
				</div>
			</div>
			
			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/packages/create.icon')}}
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="logo"  class="form-control"  accept="image/*" >
				</div>
				<div class="col-12 p-0">
					
				</div>
			</div>



			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/packages/create.bio')}}
				</div>
				<div class="col-12 pt-3">
                <textarea name="bio" class="editor with-file-explorer">{{old('bio')}}</textarea>
				</div>
			</div>

	
			</div>
 
		</div>

		<!-- Features -->

			<div class="col-12 col-lg-4 offset-md-1 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span>	{{__('admin/packages/create.features')}}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/packages/create.agent_count')}}
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="agent_count" required minlength="3"  maxlength="190" class="form-control" value="{{old('agent_count')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/packages/create.properties_count')}}
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="properties_count" required minlength="3"  maxlength="190" class="form-control" value="{{old('properties_count')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/packages/create.properties_features_count')}}
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="properties_features_count" required minlength="3"  maxlength="190" class="form-control" value="{{old('properties_count')}}" >
				</div>
			</div>
			
			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/packages/create.adds_count')}}
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="adds_count" required minlength="3"  maxlength="190" class="form-control" value="{{old('properties_count')}}" >
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