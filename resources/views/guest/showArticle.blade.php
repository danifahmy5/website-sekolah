@extends('layouts.guest')
@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('storage/bg/bg_4.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">{{ $title }}</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2">
                            <a href="{{ route('home') }}">Home <i class="ion-ios-arrow-forward"></i>
                            </a></span>
                        <span>
                            <a href="{{ route('guest.article') }}">Kegiatan <i class="ion-ios-arrow-forward"></i>
                            </a></span>
                        <span>{{ $title }} <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{ $article->title }}</h2>
                    <p>
                        <img src="{{ asset("storage/images/$article->image_title") }}" alt="" class="img-fluid">
                    </p>
                    {{ $article->description }}
                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">Life</a>
                            <a href="#" class="tag-cloud-link">Sport</a>
                            <a href="#" class="tag-cloud-link">Tech</a>
                            <a href="#" class="tag-cloud-link">Travel</a>
                        </div>
                    </div>


                </div> <!-- .col-md-8 -->

                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon icon-search"></span>
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate">
                        <h3>Kategori</h3>
                        <ul class="categories">
                            @foreach ($categories as $category)
                                <li><a href="{{ route('guest.article', ['category' => $category->id]) }}">{{ $category->name }}
                                        <span>{{ $category->articles->count() }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Kegiatan lain</h3>
                        @foreach ($articles as $a)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4"
                                    style="background-image: url({{ asset("storage/images/$a->image") }});"></a>
                                <div class="text">
                                    <h3 class="heading"><a
                                            href="{{ route('guest.article.show', $a->id) }}">{{ $a->title }}</a>
                                    </h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span>
                                                {{ $a->created_at->format('M d,Y') }}</a>
                                        </div>
                                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>Tag Cloud</h3>
                        <ul class="tagcloud m-0 p-0">
                            <a href="#" class="tag-cloud-link">School</a>
                            <a href="#" class="tag-cloud-link">Kids</a>
                            <a href="#" class="tag-cloud-link">Nursery</a>
                            <a href="#" class="tag-cloud-link">Daycare</a>
                            <a href="#" class="tag-cloud-link">Care</a>
                            <a href="#" class="tag-cloud-link">Kindergarten</a>
                            <a href="#" class="tag-cloud-link">Teacher</a>
                        </ul>
                    </div>

                </div><!-- END COL -->
            </div>
        </div>
    </section>
@endsection
