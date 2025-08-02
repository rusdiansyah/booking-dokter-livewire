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

    {{-- kontent --}}
    <section id="featured-departments" class="featured-departments section">


        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                @foreach ($data as $p)
                    <div class="col-lg-4 col-md-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="department-card">
                            <div class="department-image">
                                <img src="{{ asset('storage/'.$p->gambar) }}" alt="{{ $p->nama }}" class="img-fluid">
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

</div>
