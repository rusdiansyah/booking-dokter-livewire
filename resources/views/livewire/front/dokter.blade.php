<div>
    <div class="page-title">
        <div class="breadcrumbs">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item active current">{{ $title }}</li>
                </ol>
            </nav>
        </div>

        <div class="title-wrapper">
            <h1>{{ $title }}</h1>
        </div>
    </div>

    <section id="doctors" class="doctors section">

        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                @foreach ($data as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="doctor-card">
                            <div class="doctor-image">
                                @if ($item->foto)
                                <img src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nama }}" class="img-fluid">
                                @else
                                <img src="assets/img/health/staff-3.webp" alt="{{ $item->nama }}" class="img-fluid">
                                @endif
                                <div class="doctor-overlay">
                                    <div class="doctor-social">
                                        <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                                        <a href="#" class="social-link"><i class="bi bi-twitter"></i></a>
                                        <a href="#" class="social-link"><i class="bi bi-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="doctor-content">
                                <h4 class="doctor-name">{{ $item->nama }}</h4>
                                <p class="doctor-bio">{{ $item->keterangan }}</p>
                                <div class="doctor-experience">
                                    <span class="experience-badge">15+ Years Experience</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Doctor Card -->
                @endforeach

            </div>

        </div>

    </section>
</div>
