@extends('layouts.master')

@section('content')
    <h1>Usulan Buku</h1>
    <div class="container">
        <a href="{{ route('proposal.create') }}" class="btn btn-primary mb-3">New Proposal</a>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Kategori</th>
                <th scope="col">Status</th>
                <th scope="col">Cover</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookProposals as $index => $book)
                <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $book->book_title }}</td>
                <td>{{ $book->book_author }}</td>
                <td>{{ $book->category->name }}</td>
                <td>{{ $book->status }}</td>
                <td>
                    @unless ($book->book_cover_path === null)
                        <img src="{{ asset('storage/book_covers/' . $book->book_cover_path) }}" alt="{{ $book->title }}" width="100">
                    @else
                        <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable" alt="No Image" width="100">
                    @endunless
                </td>
                <td>
                    <a href="{{ route('proposal.show', $book->id) }}" class="btn btn-primary btn-sm">View</a>
                    <a href="{{ route('proposal.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form id="deleteForm{{ $book->id }}" action="{{ route('proposal.destroy', $book->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm delete-proposal">Delete</button>
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
    document.querySelectorAll('.delete-proposal').forEach(button => {
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