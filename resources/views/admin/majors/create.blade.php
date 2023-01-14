@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Jurusan</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('majors.index') }}">Majors</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                    </ol>
                </nav>
                <form action="{{ route('majors.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Nama</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                    placeholder="Ketikkan Nama" aria-describedby="helpId">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subtitle">subtitle</label>
                                <input type="text" name="subtitle" id="subtitle"
                                    class="form-control @error('subtitle') is-invalid @enderror"
                                    value="{{ old('subtitle') }}" placeholder="Ketikkan Nama" aria-describedby="helpId">
                                @error('subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">description</label>
                                <input type="text" name="description" id="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    value="{{ old('description') }}" placeholder="Ketikkan Nama" aria-describedby="helpId">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Foto</label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror" />
                                <small class="text-danger"><strong>Perhatian!! resolusi paling di sarankan adalah 250 x
                                        292</strong></small>
                                <span class="invalid-feedback" role="alert">
                                    @error('image')
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('majors.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>

            </div>


        </div>

    </div>
@endsection
