@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img width="1000"class="img-thumbnail" src="{{ asset("storage/images/$baner->image") }}"
                                alt="">

                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fa fa-image"></i> {{ $baner->title }}</li>
                            <li class="list-group-item"><i class="fa fa-link"></i> {{ $baner->link }}</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
