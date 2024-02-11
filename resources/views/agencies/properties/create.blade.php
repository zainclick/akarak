@php
    $title_page=__('admin/agents/create.title');
@endphp
@extends('layouts.agency')
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

	<form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('agency-agents-store')}}">
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

				<div class="col-12 col-lg-12 p-2">
				<div class="col-12">
					{{__('agent/properties/create.address')}}
				</div>
				<div class="col-12 pt-3">
					<input id="pac-input" type="text" name="address" required class="form-control" value="{{old('address')}}" >
				</div>

			</div>

			<div class="col-12 col-lg-12 p-2">
				
				<div id="map" style="height: 500px;width: 1000px;"></div>


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



        $("#pac-input").focusin(function() {
            $(this).val('');
        });

        $('#latitude').val('');
        $('#longitude').val('');


        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 24.740691, lng: 46.6528521 },
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: 'موقعك الحالي'
                    });
                    markers.push(marker);
                    marker.addListener('click', function() {
                        geocodeLatLng(geocoder, map, infoWindow,marker);
                    });
                    // to get current position address on load
                    google.maps.event.trigger(marker, 'click');
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                console.log('dsdsdsdsddsd');
                handleLocationError(false, infoWindow, map.getCenter());
            }

            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function(event) {
                SelectedLatLng = event.latLng;
                geocoder.geocode({
                    'latLng': event.latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log( results[0].formatted_address);
                            splitLatLng(String(event.latLng));
                            $("#pac-input").val(results[0].formatted_address);
                        }
                    }
                });
            });
            function geocodeLatLng(geocoder, map, infowindow,markerCurrent) {
                var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                $('#latitude').val(markerCurrent.position.lat());
                $('#longitude').val(markerCurrent.position.lng());

                geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#pac-input").val(results[0].formatted_address);

                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });
                SelectedLatLng =(markerCurrent.position.lat(),markerCurrent.position.lng());
            }
            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }
            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }
            function clearMarkers() {
                setMapOnAll(null);
            }
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            $("#pac-input").val("أبحث هنا ");
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));


                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
        function splitLatLng(latLng){
            var newString = latLng.substring(0, latLng.length-1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng  = trainindIdArray[1];

            $("#latitude").val(lat);
            $("#longitude").val(Lng);
        }

    </script>


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
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM&libraries=places&callback=initAutocomplete&language=ar&region=UAE
         async defer"></script>
@endsection