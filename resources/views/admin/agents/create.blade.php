@php
    $title_page=__('admin/agents/create.title');
@endphp
@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
		<!-- breadcrumb -->
		<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => __('admin/main.dashboard') , 'isactive' => false],
			['url' => route('admin.agents.index') , 'title' => __('admin/agents/index.title') , 'isactive' => false],
			['url' => '#' , 'title' =>  __('admin/agents/create.title'), 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->

	<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.agents.store')}}">
		@csrf
	<div class="col-12 col-lg-7 p-0 ">
	 
		<div class="col-12 col-lg-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span>	{{__('admin/agents/create.title')}}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/create.name_ar')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name_ar" required minlength="3"  maxlength="190" class="form-control" value="{{old('name_ar')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/create.name_en')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name_en" required minlength="3"  maxlength="190" class="form-control" value="{{old('name_en')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/create.vendor')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="agency"  required>
					<option>{{__('admin/agents/create.vendor')}}</option>
						@foreach($agencies as $agency)
							<option value="{{$agency->id}}"><?php if(app()->getLocale() == 'ar'){echo $agency->name_ar;}else{echo $agency->name_en;} ?></option>
						@endforeach
					</select>
				</div>
			</div>
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/create.job')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="title"  required>
					<option>{{__('admin/agents/create.job')}}</option>
						@foreach($titles as $title)
							<option value="{{$title->id}}"><?php if(app()->getLocale() == 'ar'){echo $title->name_ar;}else{echo $title->name_en;} ?></option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/create.city')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="city"  required>
					<option>{{__('admin/agents/create.city')}}</option>
						@foreach($citys as $city)
							<option value="{{$city->id}}"><?php if(app()->getLocale() == 'ar'){echo $city->name_ar;}else{echo $city->name_en;} ?></option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/create.language')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="lang[]" multiple  required>
					<option>{{__('admin/agents/create.language')}}</option>
						@foreach($languages as $language)
							<option value="{{$language->id}}"><?php if(app()->getLocale() == 'ar'){echo $language->name_ar;}else{echo $language->name_en;} ?></option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/create.slug')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="slug" required minlength="3"  maxlength="190" class="form-control" value="{{old('slug')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/create.country')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="country"  required>
					<option>{{__('admin/agents/create.country')}}</option>
						@foreach($countries as $country)
							<option value="{{$country->id}}">{{$country->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/create.since')}}
				</div>
				<div class="col-12 pt-3">
					<input type="date" name="since" required minlength="3"  maxlength="190" class="form-control" value="{{old('since')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/create.status')}}
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
					{{__('admin/agents/create.bio_ar')}}
				</div>
				<div class="col-12 pt-3">
                <textarea name="bio_ar" class="editor with-file-explorer">{{old('bio_ar')}}</textarea>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/create.bio_en')}}
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
				 	<span class="fas fa-info-circle"></span> {{__('admin/agents/create.contact')}}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agents/create.email')}}
				</div>
				<div class="col-12 pt-3">
					<input type="email" name="email" required minlength="3"  maxlength="190" class="form-control" value="{{old('email')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agents/create.password')}}
				</div>
				<div class="col-12 pt-3">
					<input type="password" name="password" required minlength="3"  maxlength="24" class="form-control" value="{{old('password')}}" >
				</div>
			</div>
			
			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agents/create.mobile')}}
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="mobile" required minlength="3"  maxlength="190" class="form-control" value="{{old('mobile')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agents/create.facebook')}}
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
					<input type="number" name="whatsapp"  minlength="3"  maxlength="190" class="form-control" value="{{old('whatsapp')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agencies/create.address')}}
				</div>
				<div class="col-12 pt-3">
			        <textarea style="width: 100%;" name="address">{{old('address')}}</textarea>
				</div>
				<div class="col-12 p-0">
					
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agents/create.logo')}}
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="logo"  class="form-control"  accept="image/*" >
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