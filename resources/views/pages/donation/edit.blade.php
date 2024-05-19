@extends('layouts.master')

@section('content')
<h1>Edit Donasi</h1>

<form action="{{ route('donation.update', $bookDonation->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $bookDonation->book->title }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" value="{{ $bookDonation->book->author }}" required>
        @error('author')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="publisher">Publisher</label>
        <input type="text" name="publisher" id="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{ $bookDonation->book->publisher }}" required>
        @error('publisher')
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
            <option value="softfile" {{ old('jenis') == 'softfile' ? 'selected' : '' }}>Softfile</option>
            <option value="hardfile" {{ old('jenis') == 'hardfile' ? 'selected' : '' }}>Hardfile</option>
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
</script>
@endsection