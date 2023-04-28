@extends('layouts.main')

@section('container')
    <section id="home"
             class="hero-section bg-violet-100 p-3 p-md-4 p-lg-5">
        <div class="row align-items-center">
            <div class="col-md-6 order-md-1 text-md-end mb-5 mb-md-0"
                 data-aos="fade-left"
                 data-aos-duration="1000">
                <div id="heroCarousel"
                     class="carousel slide"
                     data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="hero-img carousel-item active">
                            <img class="text-end img-fluid"
                                 src="img/himatik.png"
                                 class="d-block"
                                 alt="..."
                                 width="100%">
                        </div>
                        <div class="hero-img carousel-item">
                            <img class="text-end img-fluid"
                                 src="img/hero-illustration.png"
                                 class="d-block"
                                 alt="..."
                                 width="100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 order-md-0"
                 data-aos="fade-right"
                 data-aos-duration="1000">
                <h5 class="fw-light text-muted">WELCOME TO</h5>
                <h1 class="display-3 fw-bold lh-sm">HIMATIK PNL</h1>
                <p class="hero-desc">
                    Himpunan Mahasiswa Teknologi Informasi dan Komputer <br>
                    Politeknik Negeri Lhokseumawe
                </p>
                <div class="social-media d-flex my-4">
                    <p class="text-secondary">Follow Us</p>
                    <a class="media-icon link-secondary ms-3"
                       href="#">
                        <i class="fa-brands fa-instagram fa-2x"></i>
                    </a>
                    <a class="media-icon link-secondary ms-3"
                       href="#">
                        <i class="fa-brands fa-youtube fa-2x"></i>
                    </a>
                </div>
                <button type="button"
                        class="btn btn-primmary btn-cta"
                        data-bs-toggle="modal"
                        data-bs-target="#aboutUs">
                    About Us
                </button>
            </div>
        </div>
    </section>

    <section id="officials"
             class="mt-100">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center"
                     data-aos="fade-up">
                    <p class="text-green fw-medium mb-1">Officials</p>
                    <h2 class="fw-bold">Pejabat Teras</h2>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @foreach ($officials->only([1, 2, 3, 4]) as $official)
                    <div class="col"
                         data-aos="fade-up"
                         data-aos-duration="1000">
                        <div class="official-cards card rounded-3 text-center">
                            @if ($official->image != null)
                                <img src="{{ asset('storage/' . $official->image) }}"
                                     alt="{{ $official->nama }}"
                                     height="298px">
                            @else
                                <img class="img-fluid"
                                     src="img/avatar.png"
                                     class="card-img-top"
                                     alt="{{ $official->nama }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title h6">{{ $official->nama }}</h5>
                                <p class="card-text text-muted">{{ $official->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="departments"
             class="mt-100">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center"
                     data-aos="fade-up">
                    <p class="text-green fw-medium mb-1">Heads of Department</p>
                    <h2 class="fw-bold">Ketua Departemen</h2>
                </div>
            </div>
            <div class="row justify-content-center row-cols-1 row-cols-md-4 g-4">
                @foreach ($officials->except([1, 2, 3, 4]) as $official)
                    <div class="col"
                         data-aos="fade-up"
                         data-aos-duration="1000">
                        <div class="official-cards card rounded-3 text-center">
                            @if ($official->image != null)
                                <img src="{{ asset('storage/' . $official->image) }}"
                                     alt="{{ $official->nama }}"
                                     height="298px">
                            @else
                                <img class="img-fluid"
                                     src="img/avatar.png"
                                     class="card-img-top"
                                     alt="{{ $official->nama }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title h6">{{ $official->nama }}</h5>
                                <p class="card-text text-muted">{{ $official->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="tell-us"
             class="tell-us mt-100">
        <div class="container p-5 bg-violet-100 rounded-10">
            <div class="row py-5 text-center justify-content-center align-items-center">
                <div class="col-sm-6">
                    <div data-aos="fade-down"
                         data-aos-duration="1000">
                        <p class="text-green fw-medium mb-1">Stay Connected</p>
                        <h2 class="h1 fw-bold mb-2">Keep In Touch With Us<span>.</span></h2>
                    </div>
                    <div class="input-group mt-3 shadow rounded-10"
                         data-aos="fade-up"
                         data-aos-duration="1000">
                        <input type="text"
                               class="form-control py-3 px-3 border-0"
                               placeholder="Tell us something"
                               aria-label="Recipient's username"
                               aria-describedby="button-addon2">
                        <button class="btn btn-primary btn-cta"
                                type="button"
                                id="button-addon2">
                            <i class="fa-regular fa-paper-plane me-1"></i>
                            Send
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal About Us -->
    <div class="modal fade"
         id="aboutUs"
         tabindex="-1"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="exampleModalLabel">Tentang HIMATIK</h5>
                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo quod, amet distinctio libero
                        blanditiis recusandae sunt optio, explicabo quasi debitis consequatur cumque animi sed!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal About Us -->
@endsection
