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

    @if ($data)
        <section id="department-details" class="department-details section">

            <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-lg-8 mx-auto text-center intro aos-init aos-animate" data-aos="fade-up"
                        data-aos-delay="200">
                        <h2>{{ $data->judul }}</h2>
                        <div class="divider mx-auto"></div>
                        <p>{{ $data->kategori_berita->nama }}</p>
                    </div>
                </div>

                <div class="department-overview mt-5">
                    <div class="row gy-4">
                        <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right" data-aos-delay="300">
                            <div class="department-image">
                                <img src="{{ asset($data->gambar) }}" alt="{{ $data->judul }}"
                                    class="img-fluid rounded-lg">
                            </div>
                        </div>

                        <div class="col-lg-6 aos-init aos-animate" data-aos="fade-left" data-aos-delay="300">
                            <p>{{ $data->isi }}</p>
                        </div>
                    </div>
                </div>



            </div>

        </section>
    @endif
</div>
