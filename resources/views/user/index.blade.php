<!doctype html>
<html class="no-js" lang="zxx">

<!-- index-331:38-->

@include('user.components.head')

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper ">
        <!-- Begin Header Area -->
        @include('user.components.header')
        <!-- Header Area End Here -->
        <!-- Begin Slider With Category Menu Area -->
        <div class="slider-with-banner">
            <div class="container">
                <div class="row">
                    <!-- Begin Category Menu Area -->
                        <!--Category Menu Start-->
                        {{-- @include('user.components.sidebar') --}}
                        <!--Category Menu End-->
                  
                    <!-- Category Menu Area End Here -->
                    <!-- Begin Slider Area -->
                    @include('user.components.slide_hero')
                    <!-- Slider Area End Here -->
                    <!-- Begin Li Banner Area -->
                    {{-- @include('user.components.hero_pub') --}}
                    <!-- Li Banner Area End Here -->
                </div>
            </div>
        </div>
        <!-- Slider With Category Menu Area End Here -->
        <!-- Begin Li's Static Banner Area -->
        @include('user.components.hero_bottom')
        <!-- Li's Static Banner Area End Here -->
        <!-- Begin Li's Special Product Area -->
        @include('user.components.hot_product')
        <!-- Li's Special Product Area End Here -->
        <!-- Begin Featured Product With Banner Area -->
        @include('user.components.featured_products')
      
        <!-- Featured Product With Banner Area End Here -->
        <!-- Begin Li's Laptop Product Area -->
        @include('user.components.electronics')
        <!-- Li's Laptop Product Area End Here -->
        <!-- Begin Li's TV & Audio Product Area -->
        @include('user.components.clothing')
        <!-- Li's TV & Audio Product Area End Here -->
        <!-- Begin Li's Static Banner Area -->
        @include('user.components.statics_banner')
        
        <!-- Li's Static Banner Area End Here -->
        <!-- Begin Li's Trending Product Area -->
       @include('user.components.trending')
        <!-- Li's Trending Product Area End Here -->
        <!-- Begin Footer Area -->
        @include('user.components.footer')
        <!-- Footer Area End Here -->
        <!-- Begin Quick View | Modal Area -->
        @include('user.components.model')
        <!-- Quick View | Modal Area End Here -->
    </div>
    <!-- Body Wrapper End Here -->
        @include('user.components.scripts')
</body>

<!-- index-331:41-->

</html>
