@php
    $title_page=__('admin/agents/create.title');
@endphp
@extends('layouts.agent')
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

	<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('agent-proeprties-store')}}">
		@csrf
	<div class="col-12 col-lg-12 p-0 ">
	 
		<div class="col-12 col-lg-12 p-0 main-box">
			<div class="col-12 px-0">
				<div class="col-12 px-3 py-3">
				 	<span class="fas fa-info-circle"></span>	{{__('agent/properties/create.title_head')}}
				</div>
				<div class="col-12 divider" style="min-height: 2px;"></div>
			</div>
			<div class="col-12 p-3 row">
				
			
			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.property_title')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="name" required minlength="3"  maxlength="190" class="form-control" value="{{old('name')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.price')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="price" required minlength="3"  maxlength="190" class="form-control" value="{{old('price')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.property_status')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control property-status select2-select" name="property_status"  required>
							<option value="">{{__('agent/properties/create.property_status')}}</option>
						@foreach ($p_status as $status)
							<option <?php if(old('property_status') == $status->id){echo 'selected';} ?> value="{{$status->id}}"><?php if(app()->getLocale() == 'ar'){echo $status->name_ar;}else{echo $status->name_en;} ?></option>
						@endforeach
					</select>
				</div>
			</div>


			<div class="col-12 col-lg-6 p-2 rent-type d-none">
				<div class="col-12">
					{{__('agent/properties/create.rent_type')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="rent_type" >
							<option value="">{{__('agent/properties/create.rent_type')}}</option>
						
							<option <?php if(old('rent_type') == 'monthly'){echo 'selected';} ?> value="monthly">{{__('agent/properties/create.monthly')}}</option>
							<option <?php if(old('rent_type') == 'year'){echo 'selected';} ?> value="year">{{__('agent/properties/create.year')}}</option>

						
					</select>
				</div>
			</div>


			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.property_type')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="property_type"  required>
							<option value="">{{__('agent/properties/create.property_type')}}</option>
						@foreach ($types as $type)
							<option <?php if(old('property_type') == $type->id){echo 'selected';} ?> value="{{$type->id}}"><?php if(app()->getLocale() == 'ar'){echo $type->name_ar;}else{echo $type->name_en;} ?></option>
						@endforeach
					</select>
				</div>
			</div>



			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.bathrooms')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="bathrooms"  required>
						<option value="">{{__('agent/properties/create.bathrooms')}}</option>
						<option <?php if(old('bathrooms') == 1){echo 'selected';} ?> value="1">1</option>
						<option <?php if(old('bathrooms') == 2){echo 'selected';} ?> value="2">2</option>
						<option <?php if(old('bathrooms') == 3){echo 'selected';} ?> value="3">3</option>
						<option <?php if(old('bathrooms') == 4){echo 'selected';} ?> value="4">4</option>
						<option <?php if(old('bathrooms') == 5){echo 'selected';} ?> value="5">5</option>
						<option <?php if(old('bathrooms') == 6){echo 'selected';} ?> value="6">6</option>
						<option <?php if(old('bathrooms') == 7){echo 'selected';} ?> value="7">7</option>
						<option <?php if(old('bathrooms') == 8){echo 'selected';} ?> value="8">8</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.bedrooms')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="bedrooms"  required>
						<option value="">{{__('agent/properties/create.bedrooms')}}</option>
						<option <?php if(old('bedrooms') == 1){echo 'selected';} ?> value="1">1</option>
						<option <?php if(old('bedrooms') == 2){echo 'selected';} ?> value="2">2</option>
						<option <?php if(old('bedrooms') == 3){echo 'selected';} ?> value="3">3</option>
						<option <?php if(old('bedrooms') == 4){echo 'selected';} ?> value="4">4</option>
						<option <?php if(old('bedrooms') == 5){echo 'selected';} ?> value="5">5</option>
						<option <?php if(old('bedrooms') == 6){echo 'selected';} ?> value="6">6</option>
						<option <?php if(old('bedrooms') == 7){echo 'selected';} ?> value="7">7</option>
						<option <?php if(old('bedrooms') == 8){echo 'selected';} ?> value="8">8</option>
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.city')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="city"  required>
						<option>{{__('agent/properties/create.city')}}</option>
					@foreach ($citys as $city)
						<option <?php if(old('city') == $city->id){echo 'selected';} ?> value="{{$city->id}}"><?php if(app()->getLocale() == 'ar'){echo $city->name_ar;}else{echo $city->name_en;} ?></option>
					@endforeach
					</select>
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.activity_status')}}
				</div>
				<div class="col-12 pt-3">
					<select class="form-control select2-select" name="activity_status"  required>
						<option <?php if(old('activity_status') == 0){echo 'selected';} ?> value="0">{{__('main.active')}}</option>
						<option <?php if(old('activity_status') == 1){echo 'selected';} ?> value="1">{{__('main.dis_active')}}</option>
					</select>
				</div>
			</div>


			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.address')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="address" required minlength="3"  maxlength="190" class="form-control" value="{{old('address')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.area')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="area" required minlength="3"  maxlength="190" class="form-control" value="{{old('area')}}" >
				</div>
			</div>


			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.zip')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="zip" required minlength="3"  maxlength="190" class="form-control" value="{{old('zip')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.age')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="age" required  maxlength="190" class="form-control" value="{{old('age')}}" >
				</div>
			</div>

			<div class="col-12 col-lg-6 p-2">
				<div class="col-12">
					{{__('agent/properties/create.sqft')}}
				</div>
				<div class="col-12 pt-3">
					<input type="text" name="sqft" required class="form-control" value="{{old('sqft')}}" >
				</div>
			</div>


            {{-- Here is start of gallery --}}
                <div class="tab" id="tab-2">
                     <div class="gallery-box">
                    <p class="text-center">{{__('agent/properties/create.gallery')}}</p>
                    <div class="upload-inner centred">
                    <i class="fa fa-upload"></i>
                    <div class="upload-box">
                    <input type="file" id="upload_imgs" name="images[]" multiple required accept="image/*">
                                                        
                    <label for="upload_imgs">Click here to upload</label>
                		@error('images')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
            		 </div>

                     <div class="quote-imgs-thumbs quote-imgs-thumbs--hidden" id="img_preview" aria-live="polite"></div>
                                                    
                    </div>
                                            
                    </div>
                                        
                    </div>
                                    

			<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('agent/properties/create.description')}}
				</div>
				<div class="col-12 pt-3">
                <textarea name="description" class="editor with-file-explorer">{{old('description')}}</textarea>
				</div>
			</div>


			<div class="form-group col-md-12">
				<label>Other Features (optional)</label>
				<div class="row">
				
				@foreach ($features as $feature)
					<div class="col-md-3">
						<input <?php if(old('features' == $feature->id)){echo 'checked';} ?> id="{{$feature->id}}" class="checkbox-custom" name="features[]" value="{{$feature->id}}" type="checkbox">
						<label for="{{$feature->id}}" class="checkbox-custom-label"><?php if(app()->getLocale() == 'ar'){echo $feature->name_ar;}else{echo $feature->name_en;} ?></label>
					</div>

				@endforeach
				</div>
			</div>

	
			</div>
 
		</div>
		 
		<div class="col-12 p-3">
			<button class="btn btn-success" id="submitEvaluation">حفظ</button>
		</div> 
	</div>
 

		
		 
	
	</div>
	</form>

</div>
@endsection
@section('scripts')



  <script>

    var imgUpload = document.getElementById('upload_imgs'),
    imgPreview = document.getElementById('img_preview'),
    imgUploadForm = document.getElementById('img-upload-form'),
    totalFiles, previewTitle, previewTitleText, img;

    imgUpload.addEventListener('change', previewImgs, false);
    imgUploadForm.addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Images Uploaded! (not really, but it would if this was on your website)');
    }, false);

    function previewImgs(event) {
	totalFiles = imgUpload.files.length;

    if (!!totalFiles) {
    imgPreview.classList.remove('quote-imgs-thumbs--hidden');
                                           
    previewTitle = document.createElement('p');
    previewTitle.classList.add("text-center");

    previewTitle.style.fontWeight = 'bold';
    previewTitleText = document.createTextNode(totalFiles + ' Total Images Selected');
	previewTitle.appendChild(previewTitleText);
    imgPreview.appendChild(previewTitle);
    }

    for (var i = 0; i < totalFiles; i++) {
	div = document.createElement('div');
	div.classList.add('main-preview-thumb');
	imgPreview.appendChild(div);
    img = document.createElement('img');
    img.src = URL.createObjectURL(event.target.files[i]);
    img.classList.add('img-preview-thumb');
    div.appendChild(img);
	icon = document.createElement('i');
	icon.classList.add('fa');
	icon.classList.add('fa-trash');
	div.appendChild(icon);
    }
    }







    </script>

@endsection