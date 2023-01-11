@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Update Kategori Blog</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category_id">Nama</label>
                                <select name="category_id" id="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        @php
                                            $selectedCategory = old('category_id') ? old('category_id') : $category->id;
                                        @endphp
                                        <option {{ $selectedCategory == $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ? old('name') : $category->name }}" placeholder="Ketikkan Nama">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>



            </div>


        </div>

    </div>
@endsection
