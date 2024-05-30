{{-- @extends('layouts.master')

@section('content')
    <h1>Usulan Buku Aktif</h1>
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
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $book->book_title }}</td>
                        <td>{{ $book->book_author }}</td>
                        <td>{{ $book->category->name }}</td>
                        <td>{{ $book->status }}</td>
                        <td>
                            @unless ($book->book_cover_path === null)
                                <img src="{{ asset('storage/book_covers/' . $book->book_cover_path) }}"
                                    alt="{{ $book->title }}" width="100">
                            @else
                                <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable" alt="No Image"
                                    width="100">
                            @endunless
                        </td>

                        <td>
                            <form action="{{ route('proposal.closed', $book->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="closed">
                                <button type="submit" class="btn btn-danger">Stop</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}


<div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="published" role="tabpanel"
    aria-labelledby="published-tab">
    <div class="grid grid-cols-1 p-4">
        <div class="sm:-mx-6 lg:-mx-8">
            <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                <table class="w-full border-collapse" id="datatable_1_2">
                    <thead class="bg-slate-100 dark:bg-slate-700/20">
                        <tr>
                            <th class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase"
                                scope="col"></th>
                            <th scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                Title
                            </th>
                            <th scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                Author
                            </th>
                            <th scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                Kategori
                            </th>
                            <th scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                Status
                            </th>
                            <th scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                Cover
                            </th>
                            @role('admin')
                            <th scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                Action
                            </th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        <!-- 1 -->
                        @foreach ($activeProposals as $index => $book)
                            <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
                                <th class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400"
                                    scope="row">{{ $index + 1 }}</th>
                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $book->book_title }}</td>
                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $book->book_author }}</td>
                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $book->category->name }}</td>
                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    @if ($book->status == 'approved')
                                        <span
                                            class="bg-green-500/10 text-green-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Approved</span>
                                    @endif

                                </td>
                                <td>
                                    @unless ($book->image_path === null)
                                        <img src="{{ asset('storage/cover_images/' . $book->book_cover_path) }}"
                                            alt="{{ $book->title }}" width="100">
                                    @else
                                        <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable"
                                            alt="No Image" width="100">
                                    @endunless
                                </td>
                                @role('admin')
                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    <form action="{{ route('proposal.closed', $book->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="closed">
                                        <button type="submit"
                                            class="text-white bg-red-500 hover:bg-red-600  focus:outline-none font-medium rounded text-sm px-2 py-1 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 mb-2">
                                            <i data-lucide="ban"></i> Stop</button>
                                    </form>
                                </td>
                                @endrole
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div><!--end card-body-->
    <!--end grid-->
</div>

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
