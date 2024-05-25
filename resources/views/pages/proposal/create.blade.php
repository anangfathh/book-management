@extends('layouts.master')

@section('content')
<h1>Ajukan Buku</h1>

<form action="{{ route('proposal.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="book_title">Title</label>
        <input type="text" name="book_title" id="book_title" class="form-control @error('book_title') is-invalid @enderror" value="{{ old('book_title') }}" required>
        @error('book_title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="book_author">Author</label>
        <input type="text" name="book_author" id="book_author" class="form-control @error('book_author') is-invalid @enderror" value="{{ old('book_author') }}" required>
        @error('book_author')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="publication_year">Publication Year</label>
        <input type="text" name="publication_year" id="publication_year" class="form-control @error('publication_year') is-invalid @enderror" value="{{ old('publication_year') }}" required>
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
        <label for="book_price">Price</label>
        <input type="number" name="book_price" id="book_price" class="form-control @error('book_price') is-invalid @enderror" value="{{ old('book_price') }}" required>
        @error('book_price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="book_description">Deskripsi Buku</label>
        <textarea name="book_description" id="book_description" class="form-control @error('book_description') is-invalid @enderror" required>{{ old('book_description') }}</textarea>
        @error('book_description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- <div class="form-group">
        <label for="book_price">Publisher</label>
        <input type="number" name="book_price" id="book_price" class="form-control @error('book_price') is-invalid @enderror" value="{{ old('book_price') }}" required>
        @error('book_price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div> --}}

    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" required>
            @foreach ($bookCategories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="book_type">book_type</label>
        <select name="book_type" id="book_type" class="form-control @error('book_type') is-invalid @enderror" required>
            <option value="" selected disabled>Not selected</option>
            <option value="softfile" {{ old('book_type') == 'softfile' ? 'selected' : '' }}>Softfile</option>
            <option value="hardfile" {{ old('book_type') == 'hardfile' ? 'selected' : '' }}>Hardfile</option>
        </select>
        @error('book_type')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="book_cover_path">Image Path</label>
        <input type="file" name="book_cover_path" id="book_cover_path" class="form-control-file @error('book_cover_path') is-invalid @enderror">
        @error('book_cover_path')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection

@section('pagescripts')
<script>
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