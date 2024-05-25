@extends('layouts.master')

@section('content')
{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> --}}

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Detail Pinjaman</h3>
            <h6 class="card-subtitle mb-5">by : {{ $bookLoan->user->name }}</h6>
            <div class="row">
                <div class="container">
                    <div class="white-box text-center">
                    @unless ($bookLoan->book->image_path === null)
                        <img src="{{ asset('storage/cover_images/' . $bookLoan->book->image_path) }}" alt="{{ $bookLoan->book->title }}" class="img-responsive w-100">
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
                                    <td>{{ $bookLoan->book->title }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Peminjaman</td>
                                    <td>{{ $bookLoan->loan_date }}</td>
                                </tr>
                                <tr>
                                    <td>Peminjaman Hingga</td>
                                    <td>{{ $bookLoan->deadline_date }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengembalian</td>
                                    <td>@if($bookLoan->return_date)
                                        {{ $bookLoan->return_date }}
                                     @else 
                                        <span class="badge bg-danger">Belum Dikembalikan</span>
                                     @endif</td>
                                </tr>
                                <tr>
                                    <td>Status Peminjaman</td>
                                    <td>                
                                        @if($bookLoan->borrowed_status == 'borrowed')
                                            <span class="badge bg-info">Borrowed</span>
                                        @elseif($bookLoan->borrowed_status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($bookLoan->borrowed_status == 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            <span class="badge bg-success">Returned</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>{{ $bookLoan->jumlah }}</td>
                                </tr>
                                <tr>
                                    <td>Peminjam</td>
                                    <td>{{ $bookLoan->user->name }}</td>
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