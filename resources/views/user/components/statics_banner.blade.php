<div class="li-static-banner mt-4 li-static-banner-3 text-center">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Featured Banner Area -->
            <div class="col-lg-6 text-center">
                <div class="single-banner featured-banner">
                    <div class="owl-carousel pub2">
                        @foreach ($static_publications as $index => $static_publication)
                            <div class="item" style="animation-delay: {{ $index * 4 }}s;">
                                <a href="#" class="banner-link">
                                    <img src="{{ asset('storage/images/publication/' . $static_publication->image) }}"
                                        alt="Li's Featured Banner" style="height: 350px" class="fade-in">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="single-banner featured-banner">
                    <div class="owl-carousel banner">
                        @foreach ($static_publications->reverse() as $index => $static_publication)
                            <div class="item" style="animation-delay: {{ $index * 3 }}s;">
                                <a href="#" class="banner-link">
                                    <img src="{{ asset('storage/images/publication/' . $static_publication->image) }}"
                                        alt="Li's Featured Banner" style="height: 350px" class="fade-in">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Owl Carousel
            $(".banner").owlCarousel({
                items: 1,
                loop: true,
                margin: 2,
                pagination: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 5000, // 5 seconds
                animateIn: 'fadeIn', // Add animation classes
                animateOut: 'fadeOut', // Add animation classes
                responsive: {
                    0: {
                        items: 1,
                    }
                },
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Initialize Owl Carousel
            $(".pub2").owlCarousel({
                items: 1,
                loop: true,
                margin: 2,
                pagination: false,
                dots: false,
                autoplay: true,
                autoplayTimeout: 3000, // 5 seconds
                animateIn: 'fadeIn', // Add animation classes
                animateOut: 'fadeOut', // Add animation classes
                responsive: {
                    0: {
                        items: 1,
                    }
                },
            });
        });
    </script>
</div>
