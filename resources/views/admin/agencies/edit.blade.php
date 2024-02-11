@php
    $title_page=__('admin/agencies/edit.title');
@endphp
@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
		<!-- breadcrumb -->
		<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => __('admin/main.dashboard') , 'isactive' => false],
			['url' => route('admin.agencies.index') , 'title' => __('admin/agencies/index.title') , 'isactive' => false],
			['url' => '#' , 'title' =>  __('admin/agencies/edit.title'), 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->

	<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.agencies.update',$agency)}}">
		@csrf
		@method("PUT")

	<div class="col-12 col-lg-7 p-0 ">
	 
		<div class="col-12 col-lg-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span> {{__('admin/agencies/edit.title')." ".$agency->name}}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.name_ar')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name_ar" required minlength="3"  maxlength="190" class="form-control" value="{{$agency->name_ar}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.name_en')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name_en" required minlength="3"  maxlength="190" class="form-control" value="{{$agency->name_en}}" >
				</div>
			</div>
			

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.email')}}
				</div>
				<div class="col-12 pt-3">
					<input type="email" name="email" required minlength="3"  maxlength="190" class="form-control" value="{{old('email')}}" autocomplete="off">
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.password')}}
				</div>
				<div class="col-12 pt-3">
					<input type="password" name="password" required minlength="3"  maxlength="190" class="form-control" value="{{old('password')}}" autocomplete="off">
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.package')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control" name="package" required>
						@foreach($packages as $package)
							<option value="">{{__('admin/agencies/create.package')}}</option>
							<option @if($package->id == $agency->package) selected @endif value="{{$package->id}}">{{$package->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.slug')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="slug" required minlength="3"  maxlength="190" class="form-control" value="{{old('slug',$agency->slug)}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.status')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control" required name="status">
						<option @if($agency->status =="0") selected @endif value="0">{{__('admin/main.active')}}</option>
						<option @if($agency->status =="1") selected @endif value="1">{{__('admin/main.dis_active')}}</option>
					</select>
				</div>
			</div>


			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.logo')}}
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="logo"  class="form-control"  accept="image/*" >
				</div>
			<div class="col-12 pt-3">
			    <img src="{{$agency->main_image()}}" style="width:100px">

            </div>
			</div>


			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.bio')}}
				</div>
				<div class="col-12 pt-3">
                <textarea name="bio" class="editor with-file-explorer">{{old('bio',$agency->bio)}}</textarea>
				</div>
			</div>

	
			</div>
 
		</div>
		 
		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">حفظ</button>
		</div> 
	</div>


		<!-- Contact details --> 

		<div class="col-12 col-lg-4 offset-md-1 p-0 ">
	 
		<div class="col-12 col-lg-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span> {{__('admin/agencies/edit.contact')}}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.mobile')}}
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="mobile" required minlength="3"  maxlength="190" class="form-control" value="{{old('mobile',$agency->mobile)}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.facebook')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="facebook"  minlength="3"  maxlength="190" class="form-control" value="{{old('facebook',$agency->facebook)}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.whatsapp')}}
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="whatsapp"  minlength="3"  maxlength="190" class="form-control" value="{{old('whatsapp',$agency->whatsapp)}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.orn')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="orn"  class="form-control"   value="{{old('orn',$agency->orn)}}">
				</div>
		
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.stab')}}
				</div>
				<div class="col-12 pt-3">
					<input type="date" name="stab"  class="form-control"  value="{{old('stab',$agency->stab)}}">
				</div>
				<div class="col-12 p-0">
					
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/edit.address')}}
				</div>
				<div class="col-12 pt-3">
			        <textarea style="width: 100%;" name="address" >{{old('address',$agency->address)}}</textarea>
				</div>
				<div class="col-12 p-0">
					
				</div>
			</div>


	
			</div>
 
		</div>
		 
	
	</div>
	</form>

</div>
@endsection