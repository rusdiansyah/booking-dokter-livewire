<section id="featured-services" class="featured-services section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Layanan</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
            @foreach ($layanan as $lay)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <div class="service-content">
                            <h3>{{ $lay->nama }}</h3>
                            <p>{{ $lay->keterangan }}</p>
                            <img class="img-layanan" src="{{ asset('storage/'.$lay->gambar) }}" alt="" width="570">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
