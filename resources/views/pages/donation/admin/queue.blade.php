@extends('layouts.master')

@section('content')
    <h1>List books</h1>
    <div class="container">
        {{-- <a href="{{ route('donation.create') }}" class="btn btn-primary mb-3">Create Book</a> --}}
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
                @foreach ($bookDonations as $index => $donation)
                <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $donation->book->title }}</td>
                <td>{{ $donation->book->author }}</td>
                <td>{{ $donation->book->category->name }}</td>
                <td>
                    @unless ($donation->book->image_path === null)
                        <img src="{{ asset('storage/cover_images/' . $donation->book->image_path) }}" alt="{{ $donation->book->title }}" width="100">
                    @else
                        <img src="{{ asset('images/icons8-no-image-100.png') }}" alt="No Image" width="100">
                    @endunless
                </td>
                
                <td>
                    <form action="{{ route('donation.validation', $donation->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="accepted">
                        <button type="submit" class="btn btn-success">Terima</button>
                    </form>
                    <form action="{{ route('donation.validation', $donation->id) }}" method="POST">
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