@extends('layouts.master')

@section('content')
{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> --}}

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $book->title }}</h3>
            <h6 class="card-subtitle mb-5">by : {{ $book->author }}</h6>
            <div class="row">
                <div class="container">
                    <div class="white-box text-center">
                    @unless ($book->image_path === null)
                        <img src="{{ asset('storage/cover_images/' . $book->image_path) }}" alt="{{ $book->title }}" class="img-responsive">
                    @else
                        <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable" alt="No Image" class="img-responsive">
                    @endunless
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="box-title mt-5">General Info</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-product">
                            <tbody>
                                <tr>
                                    <td width="390">Title</td>
                                    <td>{{ $book->title }}</td>
                                </tr>
                                <tr>
                                    <td>Author</td>
                                    <td>{{ $book->author }}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{ $book->category->name }}</td>
                                </tr>
                                <tr>
                                    <td>Publisher</td>
                                    <td>{{ $book->publisher }}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>{{ $book->jenis }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>{{ $book->jumlah }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection