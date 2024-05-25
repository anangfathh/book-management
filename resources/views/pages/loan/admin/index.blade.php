@extends('layouts.master')

@section('content')
    <h1>Book Loan Pending List</h1>
    <div class="container">
        
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Book Title</th>
                <th scope="col">Peminjam</th>
                <th scope="col">Status</th>
                <th scope="col">Jumlah Buku</th>
                <th scope="col">Loan Date</th>
                <th scope="col">Deadline</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookLoans as $index => $loan)
                <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $loan->book->title }}</td>
                <td>{{ $loan->user->name }}</td>
        
                <td> 
                @if($loan->borrowed_status == 'borrowed')
                    <span class="badge bg-info">Borrowed</span>
                @elseif($loan->borrowed_status == 'pending')
                    <span class="badge bg-warning">Pending</span>
                @elseif($loan->borrowed_status == 'rejected')
                    <span class="badge bg-danger">Rejected</span>
                @else
                    <span class="badge bg-success">Returned</span>
                @endif
                </td>
                <td>{{ $loan->jumlah}}</td>
                <td>{{ $loan->loan_date }}</td>
                <td>
                    {{ $loan->deadline_date }}
                </td>
                <td>
                    <a href="{{ route('loan.show', $loan->id) }}" class="btn btn-primary btn-sm">View</a>
                    <form action="{{ route('loan.validation', $loan->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="borrowed">
                        <button type="button" class="btn btn-success accept-loan"><i class="bi bi-check-lg"></i></button>
                    </form>
                    <form action="{{ route('loan.validation', $loan->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="rejected">
                        <button type="button" class="btn btn-danger reject-loan" id="reject-loan"><i class="bi bi-x-lg"></i></button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('pagescripts')
<script>
    // deletion modal
    document.querySelectorAll('.reject-loan').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Hentikan aksi default dari form

            const confirmation = window.confirm('Apakah Anda yakin mereject peminjaman buku ini?');
            if (confirmation) {
                const form = this.closest('form');
                form.submit(); // Kirim form DELETE ke server
            }
        });
    });
    document.querySelectorAll('.accept-loan').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Hentikan aksi default dari form

            const confirmation = window.confirm('Apakah Anda yakin mereject peminjaman buku ini?');
            if (confirmation) {
                const form = this.closest('form');
                form.submit(); // Kirim form DELETE ke server
            }
        });
    });
</script>
@endsection