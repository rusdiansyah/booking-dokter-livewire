<section id="find-a-doctor" class="find-a-doctor section">


    <div class="container section-title" data-aos="fade-up">
        <h2>Jadwal Praktek</h2>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">


        <div class="row" data-aos="fade-up" data-aos-delay="400">
            @foreach ($jadwal as $j)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="doctor-card">
                        <div class="doctor-image">
                            <img src="{{ asset($j->dokter->foto) }}" alt="{{ $j->dokter->nama }}" class="img-fluid">
                            @if ($j->isActive)
                                <div class="availability-badge online">Ada</div>
                            @else
                                <div class="availability-badge busy">Libur</div>
                            @endif
                        </div>
                        <div class="doctor-info">
                            <h5>{{ $j->dokter->nama }}</h5>
                            <p class="specialty">{{ $j->poli->nama }}</p>
                            <p class="experience">
                                {{ $j->hari }} {{ $j->pukul }}
                            </p>
                            <div class="rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <span class="rating-text">(4.9)</span>
                            </div>
                            <div class="appointment-actions">
                                <a href="/user/booking" class="btn btn-primary btn-sm">Booking</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Doctor Card -->
            @endforeach
        </div>

    </div>

</section><!-- /Find A Doctor Section -->
