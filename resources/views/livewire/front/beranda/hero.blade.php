<section id="hero" class="hero section dark-background">
    <div class="container-fluid p-0">
        <div class="hero-wrapper">
            @if ($setting)
                <div class="hero-image">
                    <img src="{{ asset('storage/'.$setting->logo_login) }}" alt="{{ config('app.name') }}" class="img-fluid">
                </div>
            @else
                <div class="hero-image">
                    <img src="{{ asset('meditrust/assets/img/health/showcase-1.webp') }}" alt="{{ config('app.name') }}"
                        class="img-fluid">
                </div>
            @endif


            <div class="hero-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-10" data-aos="fade-right" data-aos-delay="100">
                            <div class="content-box">

                                <h1 data-aos="fade-up" data-aos-delay="200">{{ config('app.name') }}</h1>

                                <div class="cta-group" data-aos="fade-up" data-aos-delay="300">
                                    <a href="/user/booking" class="btn btn-primary">Booking</a>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section><!-- /Hero Section -->
