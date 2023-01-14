@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img width="1000"class="img-thumbnail" src="{{ asset("storage/images/$major->image") }}"
                                alt="">

                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h5>{{ $major->title }}</h5>
                            </li>
                            <li class="list-group-item">
                                <h6>{{ $major->subtitle }}</h6>
                            </li>
                            <li class="list-group-item">{{ $major->description }}</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
