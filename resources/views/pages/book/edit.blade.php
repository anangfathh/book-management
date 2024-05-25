@extends('layouts.master')

@section('content')
<h1>Edit Book</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $book->title }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" value="{{ $book->author }}" required>
        @error('author')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="publication_year">Publication Year</label>
        <input type="text" name="publication_year" id="publication_year" class="form-control @error('publication_year') is-invalid @enderror" value="{{ $book->publication_year }}" required>
        @error('publication_year')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="publisher_id">Publisher</label>
        <select name="publisher_id" id="searchable-dropdown" class="form-control @error('publisher_id') is-invalid @enderror" required>
            <option value="" selected disabled>Not selected</option>
            @foreach ($publishers as $publisher)
                <option value="{{ $publisher->id }}" {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
            @endforeach
            <option value="more">Add Manually</option>
        </select>
        @error('publisher_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div id="custom-option-form" class="form-group" style="display: none;">
        <label for="custom-option-name">Publisher Name</label>
        <input type="text" name="publisher_name" id="custom-option-name" class="form-control @error('publisher_name') is-invalid @enderror">
        @error('publisher_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="custom-option-address">Publisher Address</label>
        <input type="text" name="publisher_address" id="custom-option-address" class="form-control @error('publisher_address') is-invalid @enderror">
        @error('publisher_address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <label for="custom-option-phone">Publisher Phone</label>
        <input type="text" name="publisher_phone" id="custom-option-phone" class="form-control @error('publisher_phone') is-invalid @enderror">
        @error('publisher_phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="text" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ $book->jumlah }}" required>
        @error('jumlah')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="jenis">Jenis</label>
        <select name="jenis" id="jenis" class="form-control @error('jenis') is-invalid @enderror" required>
            <option value="" selected disabled>Not selected</option>
            <option value="softfile">Softfile</option>
            <option value="hardfile">Hardfile</option>
        </select>
        @error('jenis')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div id="pdf-path-field" class="form-group" style="display: none;">
        <label for="pdf_path">PDF Path</label>
        <input type="file" name="pdf_path" id="pdf_path" class="form-control-file @error('pdf_path') is-invalid @enderror">
        @error('pdf_path')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="image_path">Image Path</label>
        <input type="file" name="image_path" id="image_path" class="form-control-file @error('image_path') is-invalid @enderror">
        @error('image_path')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection

@section('pagescripts')
<script>
    document.getElementById('jenis').addEventListener('change', function() {
        if (this.value === 'softfile') {
            document.getElementById('pdf-path-field').style.display = 'block';
        } else {
            document.getElementById('pdf-path-field').style.display = 'none';
        }
    });

     $(document).ready(function() {
                $('#searchable-dropdown').select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                
        $('#searchable-dropdown').on('change', function() {
            if (this.value === 'more') {
                $('#custom-option-form').show();
            } else {
                $('#custom-option-form').hide();
            }
        });
            });
</script>
@endsection