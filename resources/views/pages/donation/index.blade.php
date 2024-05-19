@extends('layouts.master')

@section('content')
    <h1>Book Donation List</h1>
    <div class="container">
        <a href="{{ route('donation.create') }}" class="btn btn-primary mb-3">Create Book</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Status</th>
                <th scope="col">Kategori</th>
                <th scope="col">Cover</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookDonations as $index => $donation)
                <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $donation->book->title }}</td>
                <td>{{ $donation->book->author }}</td>
        
                <td> 
                @if($donation->status == 'pending')
                    <span class="badge bg-warning">Pending</span>
                @elseif($donation->status == 'accepted')
                    <span class="badge bg-success">Accepted</span>
                @else
                    <span class="badge bg-danger">Rejected</span>
                @endif
                </td>
                <td>{{ $donation->book->category->name }}</td>
                <td>
                    @unless ($donation->book->image_path === null)
                        <img src="{{ asset('storage/cover_images/' . $donation->book->image_path) }}" alt="{{ $donation->book->title }}" width="100">
                    @else
                        <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable" alt="No Image" width="100">
                    @endunless
                </td>
                <td>
                    <a href="{{ route('donation.show', $donation->id) }}" class="btn btn-primary btn-sm">View</a>
                    <a href="{{ route('donation.edit', $donation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @if ($donation->book->jenis == 'softfile')
                        <a href="{{ route('books.download', $donation->book->id) }}" class="btn btn-primary">Download PDF</a>
                    @endif
                    <form id="deleteForm{{ $donation->id }}" action="{{ route('donation.destroy', $donation->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm delete-book">Delete</button>
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
    document.querySelectorAll('.delete-book').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Hentikan aksi default dari form

            const confirmation = window.confirm('Apakah Anda yakin ingin menghapus buku ini?');
            if (confirmation) {
                const form = this.closest('form');
                form.submit(); // Kirim form DELETE ke server
            }
        });
    });
</script>
@endsection