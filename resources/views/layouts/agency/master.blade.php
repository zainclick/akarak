<!DOCTYPE html>
<html lang="en">

@include('layouts.agency.includes.head')

<body class="default-skin" >
<div id="preloader"><div class="preloader"><span></span><span></span></div></div>

<div id="main-wrapper" >
@include('layouts.agency.includes.navigation')

@yield('content')

@include('layouts.agency.includes.footer')
@include('layouts.agency.includes.footer-links')

</div>

</body>
</html>
