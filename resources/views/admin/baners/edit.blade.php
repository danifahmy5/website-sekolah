@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Update Baner</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('baners.index') }}">Baners</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <form action="{{ route('baners.update', $baner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Nama</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') ? old('title') : $baner->title }}" placeholder="Ketikkan Nama"
                                    aria-describedby="helpId">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" id="link"
                                    class="form-control @error('link') is-invalid @enderror"
                                    value="{{ old('link') ? old('link') : $baner->link }}" placeholder="Ketikkan Nama"
                                    aria-describedby="helpId">
                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Foto</label>
                                <div class="my-1">
                                    <img width="500" class="img-thumbnail"
                                        src='{{ asset("storage/images/$baner->image") }}' alt="">
                                </div>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror" />
                                <div class="text-danger"><small>Perhatian!!, Pastikan gambar memiliki rasio landscape dan di
                                        sarankan menggunakan resolusi 2000x1335 untuk hasil yang sempurna</small></div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('baners.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>



            </div>


        </div>

    </div>
@endsection
