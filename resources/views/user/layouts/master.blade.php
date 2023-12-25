<!doctype html>
<html class="no-js" lang="zxx">

<!-- index-331:38-->

@include('user.components.head')
<style>
    body{
        background: orange;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;      
}
</style>
<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        
        <!-- Header Area End Here -->
        <!-- Begin Slider With Category Menu Area -->
        <div class="slider-with-banner">
            <div class="container">
                <div class="row pt-4">
                   @yield('content')
                </div>
            </div>
        </div>
       
       
    </div>
    <!-- Body Wrapper End Here -->
        @include('user.components.scripts')
</body>

<!-- index-331:41-->

</html>
