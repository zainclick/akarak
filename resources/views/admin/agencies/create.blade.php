@php
    $title_page=__('admin/agencies/create.title');
@endphp
@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
		<!-- breadcrumb -->
		<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => __('admin/main.dashboard') , 'isactive' => false],
			['url' => route('admin.agencies.index') , 'title' => __('admin/agencies/index.title') , 'isactive' => false],
			['url' => '#' , 'title' =>  __('admin/agencies/create.title'), 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->

	<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.agencies.store')}}">
		@csrf
	<div class="col-12 col-lg-7 p-0 ">
	 
		<div class="col-12 col-lg-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span>	{{__('admin/agencies/create.title')}}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.name_ar')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name_ar" required minlength="3"  maxlength="190" class="form-control" value="{{old('name_ar')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.name_en')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name_en" required minlength="3"  maxlength="190" class="form-control" value="{{old('name_en')}}" >
				</div>
			</div>
			

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.email')}}
				</div>
				<div class="col-12 pt-3">
					<input type="email" name="email" required minlength="3"  maxlength="190" class="form-control" value="{{old('email')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.password')}}
				</div>
				<div class="col-12 pt-3">
					<input type="password" name="password" required minlength="3"  maxlength="190" class="form-control" value="{{old('password')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.country')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="country" required>
						@foreach($countries as $country)
							<option value="">{{__('admin/agencies/create.country')}}</option>
							<option value="{{$country->id}}">{{$country->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.city')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="city" required>
						@foreach($citys as $city)
							<option value="">{{__('admin/agencies/create.city')}}</option>
							<option value="{{$city->id}}"><?php if(app()->getLocale() == 'ar'){echo $city->name_ar;}else{echo $city->name_en;} ?></option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.package')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control" name="package" required>
					<option value="">{{__('admin/agencies/create.package')}}</option>
						@foreach($packages as $package)
							
							<option value="{{$package->id}}">{{$package->name}}</option>
						@endforeach
					</select>
				</div>
			</div>


			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.slug')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="slug" required minlength="3"  maxlength="190" class="form-control" value="{{old('slug')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.status')}}
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
					{{__('admin/agencies/create.stab')}}
				</div>
				<div class="col-12 pt-3">
					<input type="date" name="stab" required class="form-control" value="{{old('stab')}}" >
				</div>
			</div>


			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.bio_ar')}}
				</div>
				<div class="col-12 pt-3">
                <textarea name="bio_ar" class="editor with-file-explorer">{{old('bio_ar')}}</textarea>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.bio_en')}}
				</div>
				<div class="col-12 pt-3">
                <textarea name="bio_en" class="editor with-file-explorer">{{old('bio_en')}}</textarea>
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
				 	<span class="fas fa-info-circle"></span> {{__('admin/agencies/create.contact')}}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.website')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="website"  minlength="3"  maxlength="190" class="form-control" value="{{old('website')}}" >
				</div>
			</div>
			
			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.mobile')}}
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="mobile" required minlength="3"  class="form-control" value="{{old('mobile')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.facebook')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="facebook"  minlength="3"  maxlength="190" class="form-control" value="{{old('facebook')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.whatsapp')}}
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="whatsapp"  class="form-control" value="{{old('whatsapp')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.logo')}}
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="logo"  class="form-control"  accept="image/*" >
				</div>
				<div class="col-12 p-0">
					
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.orn')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="orn"  class="form-control"  value="{{old('orn')}}">
				</div>
				<div class="col-12 p-0">
					
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.stab')}}
				</div>
				<div class="col-12 pt-3">
					<input type="date" name="stab"  class="form-control"  value="{{old('stab')}}">
				</div>
				<div class="col-12 p-0">
					
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.address')}}
				</div>
				<div class="col-12 pt-3">
			        <textarea style="width: 100%;" name="address" >{{old('address')}}</textarea>
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