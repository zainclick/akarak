				<!-- Color Switcher -->
				<!--
                <div class="style-switcher">
			<div class="css-trigger"><a href="#"><i class="ti-settings"></i></a></div>
			<div>
				<ul id="themecolors" class="m-t-20">
					<li><a href="javascript:void(0)" data-skin="default-skin" class="default-theme">1</a></li>
					<li><a href="javascript:void(0)" data-skin="red-skin" class="red-theme">2</a></li>
					<li><a href="javascript:void(0)" data-skin="green-skin" class="green-theme">3</a></li>
					<li><a href="javascript:void(0)" data-skin="blue-skin" class="blue-theme">4</a></li>
					<li><a href="javascript:void(0)" data-skin="yellow-skin" class="yellow-theme">5</a></li>
					<li><a href="javascript:void(0)" data-skin="purple-skin" class="purple-theme">6</a></li>
					<li><a href="javascript:void(0)" data-skin="oceangreen-skin" class="oceangreen-theme">7</a></li>
					<li><a href="javascript:void(0)" data-skin="goodgreen-skin" class="goodgreen-theme">8</a></li>
					<li><a href="javascript:void(0)" data-skin="goodred-skin" class="goodred-theme">9</a></li>
					<li><a href="javascript:void(0)" data-skin="blue2-skin" class="blue2-theme">10</a></li>
				</ul>
			</div>
		</div>
-->
        <!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="{{asset('front/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('front/assets/js/popper.min.js')}}"></script>
		<script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('front/assets/js/rangeslider.js')}}"></script>
		<script src="{{asset('front/assets/js/select2.min.js')}}"></script>
		<script src="{{asset('front/assets/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('front/assets/js/slick.js')}}"></script>
		<script src="{{asset('front/assets/js/slider-bg.js')}}"></script>
		<script src="{{asset('front/assets/js/lightbox.js')}}"></script>
		<script src="{{asset('front/assets/js/imagesloaded.js')}}"></script>

		<script src="{{asset('front/assets/js/custom.js')}}"></script>
		<script src="{{asset('front/assets/js/cl-switch.js')}}"></script>
		<script src="http://maps.google.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
		<script src="{{asset('front/assets/js/map_infobox.js')}}"></script>
		<script src="{{asset('front/assets/js/markerclusterer.js')}}"></script>
		<script src="{{asset('front/assets/js/map.js')}}"></script>
        <script src="{{asset('front/assets/js/dropzone.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>

<script>


	
$(document).on('click','.add-fave-heart',function(e){
	if({{auth('front-user')->check()}}){
		    e.preventDefault();
	var test = $(this);
    var Form = $(this).parent().parent().serialize();
    $.ajax({
        type:'GET',
        url:'{{route('fave-property')}}',
        data: Form,
        contentType:false,
        processData:false,

        success:function(data) {
			if($(test).hasClass('success-fave')){
				$(test).removeClass('success-fave');
			}else{
				$(test).addClass('success-fave');
			}
			
        }
             
        })
	}
              
        }); 






</script>
