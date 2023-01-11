@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img width="300"class="img-fluid" src="{{ asset("storage/images/$teacher->image") }}"
                                alt="">

                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fa fa-user"></i> {{ $teacher->name }}</li>
                            <li class="list-group-item"><i class="fa fa-briefcase"></i> {{ $teacher->major }}</li>
                            <li class="list-group-item"><i class="fa fa-phone"></i> {{ $teacher->phone }}</li>
                            <li class="list-group-item"><i class="fa fa-envelope"></i> {{ $teacher->email }}</li>
                            <li class="list-group-item">{{ $teacher->description }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
