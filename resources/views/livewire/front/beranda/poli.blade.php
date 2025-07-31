<section id="featured-departments" class="featured-departments section">

    <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2>Poli</h2>
    </div>

    <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            @foreach ($poli as $p)

            <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="department-card">
                    <div class="department-image">
                        <img src="{{ asset($p->gambar) }}" alt="{{ $p->nama }}" class="img-fluid">
                    </div>
                    <div class="department-content">
                        <div class="department-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3>{{ $p->nama }}</h3>
                        <p>{{ $p->keterangan }}</p>
                    </div>
                </div>
            </div><!-- End Department Card -->

            @endforeach

        </div>

    </div>

</section>
