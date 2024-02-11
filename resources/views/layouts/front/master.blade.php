<!DOCTYPE html>
<html lang="en">

@include('layouts.front.includes.head')

<body class="default-skin" >
<div id="preloader"><div class="preloader"><span></span><span></span></div></div>

<div id="main-wrapper" >
@include('layouts.front.includes.navigation')

@yield('content')

@include('layouts.front.includes.footer')
@yield('model')
@include('layouts.front.includes.footer-links')

</div>
@yield('scripts')
</body>
</html>
