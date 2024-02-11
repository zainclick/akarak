<!DOCTYPE html>
<html lang="en">

@include('layouts.agent.includes.head')

<body class="default-skin" >
<div id="preloader"><div class="preloader"><span></span><span></span></div></div>

<div id="main-wrapper" >
@include('layouts.agent.includes.navigation')

@yield('content')

@include('layouts.agent.includes.footer')
@include('layouts.agent.includes.footer-links')

</div>
@yield('scripts')
</body>
</html>
