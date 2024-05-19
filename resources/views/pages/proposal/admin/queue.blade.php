@extends('layouts.master')

@section('content')
    <h1>Usulan Buku Validation</h1>
    <div class="container">
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
                    <form action="{{ route('proposal.validation', $book->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="approved">
                        <button type="submit" class="btn btn-success">Terima</button>
                    </form>
                    <form action="{{ route('proposal.validation', $book->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit" class="btn btn-danger">Tolak</button>
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