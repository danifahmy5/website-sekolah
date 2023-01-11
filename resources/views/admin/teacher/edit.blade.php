@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Teacher</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('teacher.index') }}">Teacher</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <form action="{{ route('teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ? old('name') : $teacher->name }}" placeholder="Ketikkan Nama"
                                    aria-describedby="helpId">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') ? old('email') : $teacher->email }}" placeholder="Ketikkan Nama"
                                    aria-describedby="helpId">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="major">Jurusan</label>
                                <input type="text" name="major" id="major"
                                    class="form-control @error('major') is-invalid @enderror"
                                    value="{{ old('major') ? old('major') : $teacher->major }}" placeholder="Ketikkan Nama"
                                    aria-describedby="helpId">
                                @error('major')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Phone</label>
                                <input type="text" name="phone" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') ? old('phone') : $teacher->phone }}" placeholder="Ketikkan Nama"
                                    aria-describedby="helpId">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">description</label>
                                <textarea type="text" name="description" id="description"
                                    class="form-control @error('description') is-invalid @enderror" placeholder="Ketikkan Nama"
                                    aria-describedby="helpId">{{ old('description') ? old('description') : $teacher->description }}
                                </textarea>
                                <span class="invalid-feedback" role="alert">
                                    @error('description')
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Foto</label>
                                <input type="file" name="image" id="image"
                                    class="form-control @error('image') is-invalid @enderror" />
                                <span class="invalid-feedback" role="alert">
                                    @error('image')
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>



            </div>


        </div>

    </div>
@endsection
