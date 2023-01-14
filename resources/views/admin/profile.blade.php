@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Home</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Home</a></li>
                    </ol>
                </nav>
                @if (Session::has('message'))
                    <div class="alert alert-info mt-1">{{ Session::get('message') }}</div>
                @endif
                <form action="{{ route('profiles.update', $profile->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') ? old('title') : $profile->title }}" placeholder="Ketikkan Nama">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') ? old('email') : $profile->email }}"
                                    placeholder="Ketikkan E-mail">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Telephone</label>
                                <input type="text" name="phone" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') ? old('phone') : $profile->phone }}"
                                    placeholder="Ketikkan E-mail">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" id="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    value="{{ old('address') ? old('address') : $profile->address }}"
                                    placeholder="Ketikkan E-mail">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" name="website" id="website"
                                    class="form-control @error('website') is-invalid @enderror"
                                    value="{{ old('website') ? old('website') : $profile->website }}"
                                    placeholder="Ketikkan E-mail">
                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </form>



            </div>


        </div>

    </div>
@endsection
