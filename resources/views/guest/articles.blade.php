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
    <section class="ftco-section bg-light">
        <div class="container">
            @if ($search)
                <h4>Hasil pencarian dari : {{ $search }}</h4>
            @endif
            @if (request()->query('hashtag'))
                <div class="btn btn-primary mb-3">
                    #{{ request()->query('hashtag') }}
                </div>
            @endif
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
                                        href={{ route('guest.article.show', $article->id) }}><?= highlight_word($article->title, $search) ?></a>
                                </h3>
                                <p>
                                    @if (strlen($article->description) < 83)
                                        <?= highlight_word($article->description, $search) ?>
                                    @else
                                        {!! highlight_word(substr($article->description, 0, 83) . '....', $search) !!}
                                    @endif
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
            {{ $articles->links('vendor.pagination.articles') }}

    </section>
@endsection
