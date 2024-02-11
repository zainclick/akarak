@php
    $title_page=__('admin/users/create.title');
@endphp
@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
		<!-- breadcrumb -->
		<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => __('main.dashboard') , 'isactive' => false],
			['url' => route('admin.users.index') , 'title' => __('admin/users/index.title') , 'isactive' => false],
			['url' => '#' , 'title' =>  __('admin/users/create.title'), 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->
	<div class="col-12 col-lg-12 p-0 ">
	 
		
		<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.users.store')}}">
		@csrf

		<div class="col-12 col-lg-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span> {{ __('admin/users/create.title')}} 
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('admin/users/create.name')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name" required minlength="3"  maxlength="190" class="form-control" value="{{old('name')}}" >
				</div>
			</div>
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('admin/users/create.email')}}
				</div>
				<div class="col-12 pt-3">
					<input type="email" name="email"  class="form-control"  value="{{old('email')}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('admin/users/create.password')}}
				</div>
				<div class="col-12 pt-3">
					<input type="password" name="password"  class="form-control" required minlength="8" >
				</div>
			</div>
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('admin/users/create.avatar')}}
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="avatar"  class="form-control"  accept="image/*" >
				</div>
				<div class="col-12 p-0">
					
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('admin/users/create.mobile')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="phone"   maxlength="190" class="form-control"  value="{{old('phone')}}" >
				</div>
			</div>
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{ __('admin/users/create.status')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control" name="blocked">
						<option @if(old('blocked')=="0") selected @endif value="0">{{__('main.active')}}ا</option>
						<option @if(old('blocked')=="1") selected @endif value="1">{{__('main.dis_active')}}</option>
					</select>
				</div>
			</div>
	
			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{ __('admin/users/create.bio')}}
				</div>
				<div class="col-12 pt-3">
					<textarea  name="bio" maxlength="5000" class="form-control" style="min-height:150px">{{old('bio')}}</textarea>
				</div>
			</div>
			
			</div>
 
		</div>
		 
		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">{{__('main.save')}}</button>
		</div> 
		</form>
	</div>
</div>
@endsection