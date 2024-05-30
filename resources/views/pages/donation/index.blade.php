@extends('layouts.app')
@section('content')
    <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
        <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-12">
            <div class="w-full relative mb-4">
                <div class="flex-auto p-0 md:p-4">
                    <div class="mb-4 border-b border-gray-200 dark:border-slate-700" data-fc-type="tab">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" aria-label="Tabs">
                            <li class="me-2" role="presentation">
                                <button class="inline-block p-4 rounded-t-lg border-b-2 active" id="all-tab"
                                    data-fc-target="#all" type="button" role="tab" aria-controls="all"
                                    aria-selected="false">
                                    All <span class="text-slate-400">{{ count($bookDonations) }}</span>
                                </button>
                            </li>
                            @role('admin')
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="published-tab" data-fc-target="#published" type="button" role="tab"
                                    aria-controls="published" aria-selected="false">
                                    Queue <span class="text-slate-400">{{ count($queueDonations) }}</span>
                                </button>
                            </li>
                            @endrole

                        </ul>
                    </div>
                    <div class="flex flex-wrap gap-4 mb-3">
                        <div class="mb-2 w-44">
                            <a href="{{ route('donation.create') }}"
                                class="inline-block focus:outline-none bg-brand-500 mt-1 text-white hover:bg-brand-600 hover:text-white text-md font-medium py-2 px-4 rounded">
                                Add Donasi
                            </a>
                        </div>
                    </div>

                    <div id="myTabContent">
                        <div class="active p-4 bg-gray-50 rounded-lg dark:bg-gray-900" id="all" role="tabpanel"
                            aria-labelledby="all-tab">
                            <div class="grid grid-cols-1 p-4">
                                <div class="sm:-mx-6 lg:-mx-8">
                                    <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                                        <table class="w-full border-collapse" id="datatable_1">
                                            <thead class="bg-slate-100 dark:bg-slate-700/20">
                                                <tr>
                                                    <th class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase"
                                                        scope="col"></th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                        Judul Buku
                                                    </th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                        Author
                                                    </th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                        Status
                                                    </th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                        Kategori
                                                    </th>

                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                        Cover
                                                    </th>
                                                    @role('admin')
                                                        <th class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase"
                                                            scope="col">Donatur</th>
                                                    @endrole
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- 1 -->
                                                @foreach ($bookDonations as $index => $donation)
                                                    <tr>
                                                        <th scope="row">{{ $index + 1 }}</th>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $donation->book->title }}</td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $donation->book->author }}</td>

                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            @if ($donation->status == 'pending')
                                                                <span class="badge bg-warning">Pending</span>
                                                            @elseif($donation->status == 'accepted')
                                                                <span class="badge bg-success">Accepted</span>
                                                            @else
                                                                <span class="badge bg-danger">Rejected</span>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $donation->book->category->name }}</td>
                                                        <td>
                                                            @unless ($donation->book->image_path === null)
                                                                <img src="{{ asset('storage/cover_images/' . $donation->book->image_path) }}"
                                                                    alt="{{ $donation->book->title }}" width="100">
                                                            @else
                                                                <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable"
                                                                    alt="No Image" width="100">
                                                            @endunless
                                                        </td>
                                                        @role('admin')
                                                            <td
                                                                class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                                {{ $donation->user->name }}</td>
                                                        @endrole
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            <a href="{{ route('donation.show', $donation->id) }}"
                                                                class="text-white bg-indigo-500 hover:bg-indigo-600  focus:outline-none font-medium rounded text-sm px-2 py-1 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 mb-2">
                                                                <i data-lucide="eye"></i></a>
                                                            <a href="{{ route('donation.edit', $donation->id) }}"
                                                                class="text-white bg-primary-500 hover:bg-primary-600  focus:outline-none font-medium rounded text-sm px-2 py-1 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 mb-2">
                                                                <i data-lucide="pencil"></i></a>
                                                            @if ($donation->book->jenis == 'softfile')
                                                                <a href="{{ route('books.download', $donation->book->id) }}"
                                                                    class="text-white bg-green-500 hover:bg-green-600  focus:outline-none font-medium rounded text-sm px-2 py-1 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-700 mb-2">
                                                                    <i data-lucide="download"></i>Download PDF</a>
                                                            @endif
                                                            <form id="deleteForm{{ $donation->id }}"
                                                                action="{{ route('donation.destroy', $donation->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button"
                                                                    class="text-white bg-red-500 hover:bg-red-600  focus:outline-none font-medium rounded text-sm px-2 py-1 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 mb-2">
                                                                    <i data-lucide="trash"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                            <!--end grid-->
                        </div>
                        @role('admin')
                            @include('pages.donation.admin.queue', [
                                'queueDonations' => $queueDonations,
                            ])
                        @endrole


                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
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
