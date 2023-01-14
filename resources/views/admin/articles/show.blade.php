@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img width="600"class="img-fluid" src="{{ asset("storage/images/$article->image_title") }}"
                                alt="">

                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fa fa-user"></i> {{ $article->title }}</li>
                            <li class="list-group-item"><i class="fa fa-list"></i> {{ $article->category->name }}</li>
                            <li class="list-group-item"><i class="fa fa-file"></i> {{ $article->description }}</li>
                            @if ($article->images != 'null')
                                <div class="row my-2">
                                    @foreach (json_decode($article->images) as $image)
                                        <div class="col">
                                            <img class="img-fluid" src="{{ asset("storage/images/$image") }}"
                                                alt="{{ $article->title }}">

                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </ul>
                        <a class="btn btn-primary" href="{{ route('articles.index') }}">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
