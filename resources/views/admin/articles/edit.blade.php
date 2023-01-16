@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row bg-white p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h1>Update Artikel</h1>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
                <form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                @php
                                    $selectedCategory = old('category_id') ? old('category_id') : $article->category_id;
                                @endphp
                                <label for="category_id">Kategori</label>
                                <select name="category_id" id="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option {{ $selectedCategory == $category->id ? 'selected' : '' }}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input type="text" name="title" id="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{ old('title') ? old('title') : $article->title }}"
                                    placeholder="Ketikkan Judul">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image_title">Gambar judul</label>
                                @if ($article->image_title)
                                    <div>
                                        <img width="200" class="img-thumbnail my-2"
                                            src="{{ asset("storage/images/$article->image_title") }}"
                                            alt="{{ $article->title }}">

                                    </div>
                                @endif

                                <input type="file" name="image_title" id="image_title"
                                    class="form-control @error('image_title') is-invalid @enderror">
                                <small class="text-danger"><strong>Perhatian!! pastikan gambar judul memiliki rasio
                                        landscape
                                        dengan
                                        resolusi paling bagus adalah 790x526</strong> </small>
                                @error('image_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="images">Gambar</label>
                                <div class="row my-2">
                                    @if ($article->images != 'null')
                                        @foreach (json_decode($article->images) as $image)
                                            <div class="col-3">
                                                <img width="200" class="img-thumbnail"
                                                    src="{{ asset("storage/images/$image") }}"
                                                    alt="{{ $article->title }}">

                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                                <input type="file" name="images[]" multiple id="images"
                                    class="form-control @error('images') is-invalid @enderror">
                                @error('images')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea type="text" name="description" id="description"
                                    class="form-control @error('description') is-invalid @enderror" placeholder="Ketikkan deskripsi">{{ old('description') ? old('description') : $article->description }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('articles.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>



            </div>


        </div>

    </div>
    <script>
        CKEDITOR.replace('description')
    </script>
@endsection
