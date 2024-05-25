@extends('layouts.master')

@section('content')
{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> --}}

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Detail Donation</h3>
            <h6 class="card-subtitle mb-5">Didonasikan oleh : {{ $bookDonation->user->name }}</h6>
            <div class="row">
                <div class="container">
                    <div class="white-box text-center">
                    @unless ($bookDonation->book->image_path === null)
                        <img src="{{ asset('storage/cover_images/' . $bookDonation->book->image_path) }}" alt="{{ $bookDonation->book->title }}" class="img-responsive w-100">
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
                                    <td>{{ $bookDonation->book->title }}</td>
                                </tr>
                                <tr>
                                    <td>Author</td>
                                    <td>{{ $bookDonation->book->author }}</td>
                                </tr>
                                <tr>
                                    <td>Penerbit</td>
                                    <td>{{ $bookDonation->book->publisher->name }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun Terbit</td>
                                    <td>{{ $bookDonation->book->publication_year }}</td>
                                </tr>
                                <tr>
                                    <td>Kategori Buku</td>
                                    <td>{{ $bookDonation->book->category->name }}</td>
                                </tr>
                                <tr>
                                    <td>Tipe Buku</td>
                                    <td>{{ ucfirst($bookDonation->book->jenis) }}</td>
                                </tr>
                                <tr>
                                    <td>Status Donasi</td>
                                    <td>                
                                        @if($bookDonation->status == 'Accepted')
                                            <span class="badge bg-success">Accepted</span>
                                        @elseif($bookDonation->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($bookDonation->status == 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah Buku Yang Didonasikan</td>
                                    <td>{{ $bookDonation->jumlah }}</td>
                                </tr>
                                <tr>
                                    <td>Pendonasi</td>
                                    <td>{{ $bookDonation->user->name }}</td>
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