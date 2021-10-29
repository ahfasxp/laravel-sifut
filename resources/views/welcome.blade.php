<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>TJ Futsal Pabedilan</title>
    <meta name="description" content="Arena Futsal di Kecamatan Pabedilan">

    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ url('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ url('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{ url('assets/css/maicons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/theme.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <style>
        .schedule {
            padding: 8px;
            text-align: center;
            color: #645F88;
        }

    </style>

</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <img src="{{ url('img/logo_tjfutsal.jpg') }}" class="img-fluid" alt="">
                </a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#schedule">Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#member">Member</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#find">Find Us</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li> --}}
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container" id="home">
            <div class="page-banner home-banner bg-primary">
                <div class="row align-items-center flex-wrap-reverse h-100">
                    <div class="col-md-6 py-5 wow fadeInLeft">
                        <h1 class="mb-4 text-white">Let's Check and Optimize your website!</h1>
                        <p class="text-lg text-white mb-5">Ignite the most powerfull growth engine you have ever built
                            for your company</p>
                    </div>
                    <div class="col-md-6 py-5 wow zoomIn">
                        <div class="img-fluid text-center">
                            <img src="{{ url('img/banner_tjfutsal.png') }}" height="400px" width="400px" alt="">
                        </div>
                    </div>
                </div>
                <a href="#about" class="btn-scroll" data-role="smoothscroll"><span
                        class="mai-arrow-down"></span></a>
            </div>
        </div>
    </header>

    <div class="page-section pb-0" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 py-3 wow fadeInUp">
                    <span class="subhead">About us</span>
                    <h1 class="title-section">TJ Futsal Pabedilan</h1>
                    <div class="divider"></div>

                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>
                    <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren.</p>
                </div>
                <div class="col-lg-6 py-3 wow fadeInRight">
                    <div class="img-fluid py-3 text-center">
                        <img class="img-fluid img-thumbnail" src="{{ url('img/logo_tjfutsal_bulat.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section" id="pricing">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <h2 class="title-section">Pricing</h2>
                <div class="subhead">Daftar Harga</div>
                <div class="divider mx-auto"></div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 py-3 wow zoomIn">
                    <table class="table text-center table-bordered">
                        <thead>
                            <tr>
                                <th colspan="3">DAFTAR HARGA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle;">
                                    UMUM
                                </th>
                                <td>08.00 - 16.00</td>
                                <td>Rp. 80.000</td>
                            </tr>
                            <tr>
                                <td>16.00 - 24.00</td>
                                <td>Rp. 100.000</td>
                            </tr>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle;">
                                    Pelajar SMA
                                </th>
                                <td>08.00 - 16.00</td>
                                <td>Rp. 70.000</td>
                            </tr>
                            <tr>
                                <td>16.00 - 24.00</td>
                                <td>Rp. 90.000</td>
                            </tr>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle;">
                                    Pelajar SMP
                                </th>
                                <td>08.00 - 16.00</td>
                                <td>Rp. 60.000</td>
                            </tr>
                            <tr>
                                <td>16.00 - 24.00</td>
                                <td>Rp. 80.000</td>
                            </tr>
                            <tr>
                                <th rowspan="2" style="vertical-align: middle;">
                                    Pelajar SD
                                </th>
                                <td>08.00 - 16.00</td>
                                <td>Rp. 50.000</td>
                            </tr>
                            <tr>
                                <td>16.00 - 24.00</td>
                                <td>Rp. 70.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section bg-light" id="schedule">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <h2 class="title-section">Schedule</h2>
                <div class="subhead">Jadwal Pertandingan</div>
                <div class="divider mx-auto"></div>
            </div>

            <div class="row">
                <div class="col-md-12 py-3 wow zoomIn">
                    @forelse($schedules as $schedule)
                        <div class="row mb-3">
                            <div class="col-sm-6 col-lg-4 col-xl-3 wow zoomIn">
                                <div class="schedule bg-primary text-white">
                                    <i class="far fa-clock"></i>
                                    {{ Carbon\Carbon::parse($schedule->date)->format('d M, Y (H:i') }}
                                    WIB)
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 col-xl-3 wow zoomIn">
                                <div class="schedule">
                                    {{ $schedule->customer->name }}
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 col-xl-3 wow zoomIn">
                                <div class="schedule">
                                    {{ $schedule->description }}
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 col-xl-3 wow zoomIn">
                                <div class="schedule">
                                    {{ $schedule->customer->address }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12 wow zoomIn">
                            <p class="schedule">
                                Tidak Ada Jadwal Pertandingan
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section banner-seo-check" id="member">
        <div class="wrap bg-image" style="background-image: url({{ url('assets/img/bg_pattern.svg') }}">
            <div class="container text-center">
                <div class="row justify-content-center wow fadeInUp">
                    <div class="col-lg-8">
                        <h2>Member</h2>
                        <div class="subhead mb-4 text-white">Check Member Tim Kamu</div>
                        <form action="{{ url('/') }}" method="GET">
                            <input type="text" class="form-control" name="member"
                                value="{{ request()->input('member') }}" placeholder="Check Member Kamu Disini">
                            <button type="submit" class="btn btn-success">Check</button>
                        </form>
                    </div>
                </div>
            </div> <!-- .container -->
            @if (request()->input('member') != null)
                @if (isset($member) && isset($memberMains))
                    <div class="container mt-5 wow fadeInUp">
                        <h2>Detail Member Tim TJ Futsal Pabedilan</h2>
                        <div class="divider bg-white"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Nama : {{ $member->customer->name }}</p>
                                <p>Alamat : {{ $member->customer->address }}</p>
                                <p>Status : {{ $member->customer->status }}</p>
                                <p>Berlaku s/d : {{ Carbon\Carbon::parse($member->available_at)->format('d-m-Y') }}
                                </p>
                                <p>Harga Free : {{ $member->price_free }}</p>
                            </div>
                            <div class="col-md-8">
                                @php
                                    $countMain = \App\MemberMain::where('member_id', $member->id)->count();
                                @endphp
                                <p>Jumlah Permainan : <i class="fas fa-futbol"></i> {{ $countMain }} x</p>
                                @forelse($memberMains as $memberMain)
                                    <div class="row mb-1">
                                        <div class="col-sm-6 col-lg-4 col-xl-4 wow zoomIn">
                                            <div class="schedule text-white bg-secondary">
                                                <i class="fas fa-calendar-alt"></i>
                                                {{ Carbon\Carbon::parse($memberMain->date)->format('d-m-Y') }}
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 col-xl-4 wow zoomIn">
                                            <div class="schedule text-white">
                                                {{ $member->customer->name }}
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-4 col-xl-4 wow zoomIn">
                                            <div class="schedule text-white">
                                                {{ $memberMain->description }}
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12 wow zoomIn">
                                        <p class="schedule">
                                            Belum Ada Permainan
                                        </p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-center">Member Tidak Ditemukan</p>
                @endif
            @endif
            <div class="container text-center mt-3 wow fadeInDown">
                <h3>Jadilah Member TJ Futsal Pabedilan, Main 5x Gratis 1x</h3>
            </div>
        </div> <!-- .wrap -->
    </div> <!-- .page-section -->

    <div class="page-section" id="find">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <h2 class="title-section">Find Us</h2>
                <div class="subhead">Temukan Kami Di Gmaps</div>
                <div class="divider mx-auto"></div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 py-3 wow zoomIn">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.336323031344!2d108.75674071414403!3d-6.850227368918225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f0652e1d3c6c7%3A0xefcfd6bd8fa68df6!2sTJ%20Futsal%20Pabedilan!5e0!3m2!1sen!2sid!4v1634781913647!5m2!1sen!2sid"
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .page-section -->

    {{-- <!-- Banner info -->
    <div class="page-section banner-info">
        <div class="wrap bg-image" style="background-image: url({{ url('assets/img/bg_pattern.svg') }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 py-3 pr-lg-5 wow fadeInUp">
                        <h2 class="title-section">SEO to Improve Brand <br> Visibility</h2>
                        <div class="divider"></div>
                        <p>We're an experienced and talented team of passionate consultants who breathe with search
                            engine marketing.</p>

                        <ul class="theme-list theme-list-light text-white">
                            <li>
                                <div class="h5">SEO Content Strategy</div>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                    tempor</p>
                            </li>
                            <li>
                                <div class="h5">B2B SEO</div>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                    tempor</p>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 py-3 wow fadeInRight">
                        <div class="img-fluid text-center">
                            <img src="{{ url('assets/img/banner_image_2.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .wrap -->
    </div> <!-- .page-section --> --}}

    <footer class="page-footer bg-image" style="background-image: url({{ url('assets/img/world_pattern.svg') }}">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-3 py-3">
                    <h3>TJ Futsal Pabedilan</h3>
                    <p>Jl. Mayor Jendral Sutoyo, Silihasih, Kec. Pabedilan, Cirebon, Jawa Barat 45193</p>
                </div>
                <div class="col-lg-3 py-3">
                    <h3>Contact Us</h3>
                    <div class="social-media-button mb-2">
                        <a href="#"><span class="mai-logo-whatsapp"></span></a><span class="text-white"> 0821 2720
                            7087</span>
                    </div>
                    <div class="social-media-button mb-2">
                        <a href="#"><span class="mai-logo-facebook-f"></span></a><span class="text-white"> TJ
                            Futsal Pabedilan</span>
                    </div>
                    <div class="social-media-button mb-2">
                        <a href="#"><span class="mai-map"></span></a><span class="text-white"> TJ
                            Futsal Pabedilan</span>
                    </div>

                </div>
            </div>
            <p class="text-center" id="copyright">Copyright &copy; 2021. TJ Futsal Pabedilan - Made with <i
                    class="fas fa-heart"></i> By Ahfas</p>
        </div>
    </footer>

    <script src="{{ url('assets/js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ url('assets/js/google-maps.js') }}"></script>

    <script src="{{ url('assets/vendor/wow/wow.min.js') }}"></script>

    <script src="{{ url('assets/js/theme.js') }}"></script>

</body>

</html>
