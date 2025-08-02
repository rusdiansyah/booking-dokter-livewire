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
    {{-- content --}}
    <section id="services" class="services section">

        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

            <div class="services-tabs">


                <div class="tab-content aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">


                    <div class="row g-4">
                        @foreach ($data as $item)
                            <div class="col-lg-6">
                                <div class="service-item">
                                    <div class="service-icon-wrapper">
                                        <i class="fa fa-stethoscope"></i>
                                    </div>
                                    <div class="service-details">
                                        <h5>{{ $item->nama }}</h5>
                                        <p>{{ $item->keterangan }}</p>
                                        <img class="img-layanan" src="{{ asset('storage/'.$item->gambar) }}" alt="" width="320">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>


                </div>
            </div>



        </div>

    </section>

</div>
