@extends('layouts.master')

@section('content')
    <h1>Book Loan List</h1>
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
                    {{-- <a href="{{ route('loan.edit', $loan->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                    @if ($loan->borrowed_status == 'pending')              
                    <form id="deleteForm{{ $loan->id }}" action="{{ route('loan.destroy', $loan->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm delete-book">Delete</button>
                    </form>
                    @endif
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
    document.querySelectorAll('.delete-book').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Hentikan aksi default dari form

            const confirmation = window.confirm('Apakah Anda yakin ingin membatalkan peminjaman ini?');
            if (confirmation) {
                const form = this.closest('form');
                form.submit(); // Kirim form DELETE ke server
            }
        });
    });
</script>
@endsection