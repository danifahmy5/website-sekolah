@php
    $profile = profile();
    $articles = article();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }} | {{ env('APP_NAME') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('template/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('template/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
</head>

<body>
    <div class="py-2 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md-5 pr-4 d-flex topper align-items-center">
                            <div class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-map"></span></div>
                            <span class="text">{{ $profile->address }}</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">{{ $profile->email }}</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <span class="text">{{ $profile->phone }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand" href="index.html">{{ env('APP_NAME') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="nav-link pl-0">Home</a>
                    </li>
                    <li class="nav-item  {{ request()->is('guru') ? 'active' : '' }}">
                        <a href="{{ route('guest.teachers') }}" class="nav-link">Guru</a>
                    </li>
                    <li class="nav-item {{ request()->is('jurusan') ? 'active' : '' }}">
                        <a href="{{ route('guest.majors') }}" class="nav-link">Jurusan</a>
                    </li>
                    <li class="nav-item {{ request()->is('kegiatan') ? 'active' : '' }}">
                        <a href="{{ route('guest.article') }}" class="nav-link">kegiatan</a>
                    </li>
                    <li class="nav-item {{ request()->is('kontak') ? 'active' : '' }}">
                        <a href="{{ route('guest.contact') }}" class="nav-link">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    @yield('content')


    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6 col-lg-3">
                    <div class="ftco-footer-widget mb-5">
                        <h2 class="ftco-heading-2">Hubungi kami</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span
                                        class="text">{{ $profile->address }}</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span
                                            class="text">{{ $profile->phone }}</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">{{ $profile->email }}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="ftco-footer-widget mb-5">
                        <h2 class="ftco-heading-2">Kegiatan</h2>
                        @foreach ($articles as $article)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4"
                                    style="background-image: url({{ asset("storage/images/$article->image_title") }});"></a>
                                <div class="text">
                                    <h3 class="heading"><a
                                            href="{{ route('guest.article.show', $article->id) }}">{{ $article->title }}</a>
                                    </h3>
                                    <div class="meta">
                                        <div><a href="{{ route('guest.article.show', $article->id) }}"><span
                                                    class="icon-calendar"></span>
                                                {{ $article->created_at->format('M d,Y') }}</a>
                                        </div>
                                        <div><a href="{{ route('guest.article.show', $article->id) }}"><span
                                                    class="icon-person"></span> Admin</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="ftco-footer-widget mb-5 ml-md-4">
                        <h2 class="ftco-heading-2">Links</h2>
                        <ul class="list-unstyled">
                            <li>
                                <a href="{{ route('home') }}">
                                    <span class="ion-ios-arrow-round-forward mr-2"></span>Home
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('guest.teachers') }}">
                                    <span class="ion-ios-arrow-round-forward mr-2"></span>Guru
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('guest.majors') }}">
                                    <span class="ion-ios-arrow-round-forward mr-2"></span>Jurusan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('guest.article') }}">
                                    <span class="ion-ios-arrow-round-forward mr-2"></span>Kegiatan
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('guest.contact') }}">
                                    <span class="ion-ios-arrow-round-forward mr-2"></span>Kontak
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="ftco-footer-widget mb-5">
                        @if ($profile->twitter || $profile->facebook || $profile->instagram)
                            <h2 class="ftco-heading-2 mb-0">Terhubung Melalui</h2>
                            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                                @if (isset($profile->twitter))
                                    <li class="ftco-animate"><a href="{{ $profile->twitter }}"><span
                                                class="icon-twitter"></span></a>
                                    </li>
                                @endif
                                @if (isset($profile->facebook))
                                    <li class="ftco-animate"><a href="{{ $profile->facebook }}"><span
                                                class="icon-facebook"></span></a>
                                    </li>
                                @endif
                                @if (isset($profile->instagram))
                                    <li class="ftco-animate"><a href="{{ $profile->instagram }}"><span
                                                class="icon-instagram"></span></a>
                                    </li>
                                @endif
                            </ul>
                        @endif

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i
                            class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('template/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('template/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('template/js/aos.js') }}"></script>
    <script src="{{ asset('template/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('template/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('template/js/google-map.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>

</body>

</html>
