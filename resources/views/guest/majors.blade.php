@extends('layouts.guest')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('storage/bg/bg_4.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">{{ $title }}</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>{{ $title }} <i
                                class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                @foreach ($majors as $major)
                    <div class="col-md-6 course d-lg-flex ftco-animate">
                        <div class="img" style="background-image: url({{ asset("storage/images/$major->image") }});">
                        </div>
                        <div class="text bg-light p-4">
                            <h3><a href="#">{{ $major->title }}</a></h3>
                            <p class="subheading">{{ $major->subtitle }}</p>
                            <p>{{ $major->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
