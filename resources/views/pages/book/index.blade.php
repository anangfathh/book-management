@extends('layouts.master')

@section('content')
    <h1>List books</h1>
    <div class="container">
        @role('admin')
        <a href="{{ route('book.make') }}" class="btn btn-primary mb-3">Create Book</a>
        @endrole
        <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Kategori</th>
                <th scope="col">Cover</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $index => $book)
                <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->category->name }}</td>
                <td>
                    @unless ($book->image_path === null)
                        <img src="{{ asset('storage/cover_images/' . $book->image_path) }}" alt="{{ $book->title }}" width="100">
                    @else
                        <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable" alt="No Image" width="100">
                    @endunless
                </td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                    
                    @if ($book->jenis == 'hardfile')
                    @role('dosen')
                    <a href="{{ route('loan.make', $book->id) }}" class="btn btn-info btn-sm">Borrow</a>
                    @endrole
                    @else
                    <a href="{{ route('books.download', $book->id) }}" class="btn btn-primary"><i class="bi bi-cloud-arrow-down"></i></a>
                    @endif
                    @role('admin')
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                    <form id="deleteForm{{ $book->id }}" action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm delete-book"><i class="bi bi-trash"></i></button>
                    </form>
                    @endrole
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