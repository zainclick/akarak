@php
    $title_page=__('admin/agents/edit.title');
@endphp
@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
		<!-- breadcrumb -->
		<x-bread-crumb :breads="[
			['url' => url('/admin') , 'title' => __('admin/main.dashboard') , 'isactive' => false],
			['url' => route('admin.agents.index') , 'title' => __('admin/agents/index.title') , 'isactive' => false],
			['url' => '#' , 'title' =>  __('admin/agents/edit.title'), 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->

	<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.agents.update',$agent)}}">
		@csrf
		@method('PUT')
	<div class="col-12 col-lg-7 p-0 ">
	 
		<div class="col-12 col-lg-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span>	{{__('admin/agents/edit.title')}}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.name_ar')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name_ar" required minlength="3"  maxlength="190" class="form-control" value="{{$agent->name_ar}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.name_en')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name_en" required minlength="3"  maxlength="190" class="form-control" value="{{$agent->name_en}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.vendor')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="agency"  required>
					<option>{{__('admin/agents/edit.vendor')}}</option>
						@foreach($agencies as $agency)
							<option @if($agent->agency == $agency->id) selected @endif value="{{$agency->id}}"><?php if(app()->getLocale() == 'ar'){echo $agency->name_ar;}else{echo $agency->name_en;} ?></option>
						@endforeach
					</select>
				</div>
			</div>
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.job')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="title"  required>
					<option>{{__('admin/agents/edit.job')}}</option>
						@foreach($titles as $title)
							<option @if($agent->title == $title->id) selected @endif value="{{$title->id}}"><?php if(app()->getLocale() == 'ar'){echo $title->name_ar;}else{echo $title->name_en;} ?></option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.city')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="city"  required>
					<option>{{__('admin/agents/edit.city')}}</option>
						@foreach($citys as $city)
							<option @if($agent->city == $city->id) selected @endif value="{{$city->id}}"><?php if(app()->getLocale() == 'ar'){echo $city->name_ar;}else{echo $city->name_en;} ?></option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.language')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="lang[]" multiple  required>
					<option>{{__('admin/agents/edit.language')}}</option>
						@foreach($languages as $language)
							<option 
							<?php $lang = \App\Models\Backend\AgentsLanguages::where(['agent' => $agent->id,'language' => $language->id])->get(); ?> 
							<?php if($lang->count() > 0){echo "selected";}; ?>
							 value="{{$language->id}}">
							<?php if(app()->getLocale() == 'ar'){echo $language->name_ar;}else{echo $language->name_en;} ?></option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.slug')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="slug" readonly required minlength="3"  maxlength="190" class="form-control" value="{{$agent->slug}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.country')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="country"  required>
					<option>{{__('admin/agents/edit.country')}}</option>
						@foreach($countries as $country)
							<option @if($agent->country == $country->id) selected @endif value="{{$country->id}}">{{$country->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.since')}}
				</div>
				<div class="col-12 pt-3">
					<input type="date" name="since" required minlength="3"  maxlength="190" class="form-control" value="{{$agent->since}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.status')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control" required name="status">
						<option @if($agent->status =="0") selected @endif value="0">{{__('admin/main.active')}}</option>
						<option @if($agent->status =="1") selected @endif value="1">{{__('admin/main.dis_active')}}</option>
					</select>
				</div>
			</div>



			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.bio_ar')}}
				</div>
				<div class="col-12 pt-3">
                <textarea name="bio_ar" class="editor with-file-explorer">{{$agent->bio_ar}}</textarea>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.bio_en')}}
				</div>
				<div class="col-12 pt-3">
                <textarea name="bio_en" class="editor with-file-explorer">{{$agent->bio_en}}</textarea>
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
				 	<span class="fas fa-info-circle"></span> {{__('admin/agents/edit.contact')}}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.email')}}
				</div>
				<div class="col-12 pt-3">
					<input type="email" name="email" required minlength="3"  maxlength="190" class="form-control" value="{{$agent->email}}" >
				</div>
			</div>
			
			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.mobile')}}
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="mobile" required minlength="3"  maxlength="190" class="form-control" value="{{$agent->mobile}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.facebook')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="facebook"  minlength="3"  maxlength="190" class="form-control" value="{{$agent->facebook}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/vendors/edit.whatsapp')}}
				</div>
				<div class="col-12 pt-3">
					<input type="number" name="whatsapp"  minlength="3"  maxlength="190" class="form-control" value="{{$agent->whatsapp}}" >
				</div>
			</div>

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('admin/agents/edit.logo')}}
				</div>
				<div class="col-12 pt-3">
					<input type="file" name="logo"  class="form-control"  accept="image/*" >
				</div>
			<div class="col-12 pt-3">
			    <img src="{{$agent->main_image()}}" style="width:100px">

            </div>
			</div>



	
			</div>
 
		</div>
		 
	
	</div>
	</form>

</div>
@endsection