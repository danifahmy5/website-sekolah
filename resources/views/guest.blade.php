@extends('layouts.guest')

@section('content')
    @php
        shuffle($images);
    @endphp
    <section class="home-slider owl-carousel">
        @foreach ($baners as $baner)
            <div class="slider-item" style="background-image:url({{ asset("storage/images/$baner->image") }});">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-center justify-content-center"
                        data-scrollax-parent="true">
                        <div class="col-md-8 text-center ftco-animate">
                            <h1 class="mb-4">{{ $baner->title }}</span></h1>
                            <p><a href="{{ $baner->link }}" class="btn btn-secondary px-4 py-3 mt-3">Read More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section>

    <section class="ftco-services ftco-no-pb">
        <div class="container-wrap">
            <div class="row no-gutters">

                <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-primary">
                    <div class="media block-6 d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-teacher"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Certified Teachers</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-tertiary">
                    <div class="media block-6 d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-reading"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Special Education</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-fifth">
                    <div class="media block-6 d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-books"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Book &amp; Library</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-quarternary">
                    <div class="media block-6 d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-diploma"></span>
                        </div>
                        <div class="media-body p-2 mt-3">
                            <h3 class="heading">Certification</h3>
                            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftc-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
                    <div class="text px-4 ftco-animate">
                        <h2 class="mb-4">Welcome to Kiddos Learning School</h2>
                        <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                            would have been rewritten a thousand times and everything that was left from its origin
                            would be the word.</p>
                        <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language
                            ocean. A small river named Duden flows by their place and supplies it with the necessary
                            regelialia. And if she hasn’t been rewritten, then they are still using her.</p>
                        <p><a href="#" class="btn btn-secondary px-4 py-3">Read More</a></p>
                    </div>
                </div>
                <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
                    <h2 class="mb-4">What We Offer</h2>
                    <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it
                        would have been rewritten a thousand times and everything that was left from its origin would be
                        the word.</p>
                    <div class="row mt-5">
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-security"></span></div>
                                <div class="text">
                                    <h3>Safety First</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-reading"></span></div>
                                <div class="text">
                                    <h3>Regular Classes</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-diploma"></span></div>
                                <div class="text">
                                    <h3>Certified Teachers</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-education"></span></div>
                                <div class="text">
                                    <h3>Sufficient Classrooms</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-jigsaw"></span></div>
                                <div class="text">
                                    <h3>Creative Lessons</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-2 d-flex">
                                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span
                                        class="flaticon-kids"></span></div>
                                <div class="text">
                                    <h3>Sports Facilities</h3>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-intro" style="background-image: url({{ asset('storage/bg/bg_1.jpg') }});"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2>Teaching Your Child Some Good Manners</h2>
                    <p class="mb-0">A small river named Duden flows by their place and supplies it with the necessary
                        regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your
                        mouth.</p>
                </div>
                <div class="col-md-3 d-flex align-items-center">
                    <p class="mb-0"><a href="#" class="btn btn-secondary px-4 py-3">Take a Course</a></p>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Certified</span> Teachers</h2>
                    <p>Separated they live in. A small river named Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country</p>
                </div>
            </div>
            <div class="row">
                @foreach ($teachers as $teacher)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="staff">
                            <div class="img-wrap d-flex align-items-stretch">
                                <div class="img align-self-stretch"
                                    style="background-image: url({{ asset("storage/images/$teacher->image") }});">
                                </div>
                            </div>
                            <div class="text pt-3 text-center">
                                <h3>{{ $teacher->name }}</h3>
                                <span class="position mb-2">{{ $teacher->major }}</span>
                                <div class="faded">
                                    <p>{{ strlen($teacher->description) < 81 ? $teacher->description : substr($teacher->description, 0, 80) . '....' }}
                                    </p>
                                    <ul class="ftco-social text-center">
                                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                        </li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-facebook"></span></a>
                                        </li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-google-plus"></span></a>
                                        </li>
                                        <li class="ftco-animate"><a href="#"><span
                                                    class="icon-instagram"></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Our</span> Courses</h2>
                    <p>Separated they live in. A small river named Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country</p>
                </div>
            </div>
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

    <section class="ftco-section ftco-counter img" id="section-counter"
        style="background-image: url({{ asset('storage/bg/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section heading-section-black ftco-animate">
                    <h2 class="mb-4"><span>20 Years of</span> Experience</h2>
                    <p>Separated they live in. A small river named Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country</p>
                </div>
            </div>
            <div class="row d-md-flex align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="row d-md-flex align-items-center">
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="18">0</strong>
                                    <span>Certified Teachers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="351">0</strong>
                                    <span>Successful Kids</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="564">0</strong>
                                    <span>Happy Parents</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18">
                                <div class="icon"><span class="flaticon-doctor"></span></div>
                                <div class="text">
                                    <strong class="number" data-number="300">0</strong>
                                    <span>Awards Won</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <h2 class="mb-4"><span>Recent</span> Blog</h2>
                    <p>Separated they live in. A small river named Duden flows by their place and supplies it with the
                        necessary regelialia. It is a paradisematic country</p>
                </div>
            </div>
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-6 col-lg-4 ftco-animate">
                        <div class="blog-entry">
                            <a href="{{ route('guest.article.show', $article->id) }}"
                                class="block-20 d-flex align-items-end"
                                style="background-image: url({{ asset("storage/images/$article->image_title") }});">
                                <div class="meta-date text-center p-2">
                                    <span class="day">{{ $article->created_at->format('d') }}</span>
                                    <span class="mos">{{ $article->created_at->format('M') }}</span>
                                    <span class="yr">{{ $article->created_at->format('Y') }}</span>
                                </div>
                            </a>
                            <div class="text bg-white p-4">
                                <h3 class="heading"><a
                                        href="{{ route('guest.article.show', $article->id) }}">{{ $article->title }}</a>
                                </h3>
                                <p>{{ strlen($article->description) < 83 ? $article->description : substr($article->description, 0, 83) . '....' }}
                                </p>
                                <div class="d-flex align-items-center mt-4">
                                    <p class="mb-0"><a href="{{ route('guest.article.show', $article->id) }}"
                                            class="btn btn-secondary">Read More <span
                                                class="ion-ios-arrow-round-forward"></span></a>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ftco-gallery">
        <div class="container-wrap">
            <div class="row no-gutters">
                @foreach ($images as $image)
                    @if ($loop->index < 4)
                        <div class="col-md-3 ftco-animate">
                            <a href="{{ Storage::url($image) }}"
                                class="gallery image-popup img d-flex align-items-center"
                                style="background-image: url({{ Storage::url($image) }});">
                                <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                    <span class="icon-instagram"></span>
                                </div>
                            </a>
                        </div>
                    @endif
                    @if ($loop->index > 3)
                    @break
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection
