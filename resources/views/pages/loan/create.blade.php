@extends('layouts.master')

@section('content')
<h1>Formulir Peminjaman</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('loan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="book_id">Book Title</label>
        <input type="text" name="book_id" id="book_id" class="form-control @error('title') is-invalid @enderror" value="{{$book->id}}" hidden>
        <input type="text" name="book_title" id="book_id" class="form-control @error('title') is-invalid @enderror" value="{{ $book->title }}" readonly>
        @error('book_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="loan_date">Tanggal Peminjaman</label>
        <input type="date" name="loan_date" id="loan_date" class="form-control @error('loan_date') is-invalid @enderror" value="{{ old('loan_date') }}" required>
        @error('loan_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="deadline_date">Peminjaman Hingga</label>
        <input type="date" name="deadline_date" id="deadline_date" class="form-control @error('deadline_date') is-invalid @enderror" value="{{ old('deadline_date') }}" required>
        @error('deadline_date')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="jumlah">Jumlah Buku</label>
        <input type="number" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}" max="{{ $book->jumlah }}" min="0">
        @error('jumlah')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
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