@extends('layouts.master')

@section('content')
{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> --}}

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $bookProposal->book_title }}</h3>
            <h6 class="card-subtitle mb-5">by : {{ $bookProposal->book_author }}</h6>
            <div class="row">
                <div class="container">
                    <div class="white-box text-center">
                    @unless ($bookProposal->book_cover_path === null)
                        <img src="{{ asset('storage/book_covers/' . $bookProposal->book_cover_path) }}" alt="{{ $bookProposal->book_title }}" class="img-responsive w-100">
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
                                    <td>{{ $bookProposal->book_title }}</td>
                                </tr>
                                <tr>
                                    <td>Author</td>
                                    <td>{{ $bookProposal->book_author }}</td>
                                </tr>
                                <tr>
                                    <td>Category</td>
                                    <td>{{ $bookProposal->category->name }}</td>
                                </tr>
                                <tr>
                                    <td>Publisher</td>
                                    <td>{{ $bookProposal->publisher }}</td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>Rp. {{ $bookProposal->book_price }}</td>
                                </tr>
                                <tr>
                                    <td>Type</td>
                                    <td>{{ $bookProposal->book_type }}</td>
                                </tr>
                                <tr>
                                    <td>Pengusul</td>
                                    <td>{{ $bookProposal->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>{{ $bookProposal->status }}</td>
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