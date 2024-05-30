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
                                    All <span class="text-slate-400">{{ count($bookProposals) }}</span>
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                    id="published-tab" data-fc-target="#published" type="button" role="tab"
                                    aria-controls="published" aria-selected="false">
                                    Proposal Terproses <span class="text-slate-400">{{ count($activeProposals) }}</span>
                                </button>
                            </li>
                            @role('admin')
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="drafts-tab" data-fc-target="#drafts" type="button" role="tab"
                                        aria-controls="drafts" aria-selected="false">
                                        Antrean Proposal <span class="text-slate-400">{{ count($queueProposals) }}</span>
                                    </button>
                                </li>
                            @endrole
                        </ul>
                    </div>
                    <div class="flex flex-wrap gap-4 mb-3">
                        <div class="mb-2 w-44">
                            <a href="{{ route('proposal.create') }}"
                                class="inline-block focus:outline-none bg-brand-500 mt-1 text-white hover:bg-brand-600 hover:text-white text-md font-medium py-2 px-4 rounded">
                                Add Proposal
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
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- 1 -->


                                                @foreach ($bookProposals as $index => $book)
                                                    <tr
                                                        class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
                                                        <th class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400"
                                                            scope="row">{{ $index + 1 }}</th>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $book->book_title }}</td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $book->book_author }}</td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $book->category->name }}</td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            @if ($book->status == 'approved')
                                                                <span
                                                                    class="bg-green-500/10 text-green-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Approved</span>
                                                            @elseif ($book->status == 'pending')
                                                                <span
                                                                    class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Pending</span>
                                                            @elseif ($book->status == 'rejected')
                                                                <span
                                                                    class="bg-red-500/10 text-red-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Rejected</span>
                                                            @else
                                                                <span
                                                                    class="bg-gray-500/10 text-gray-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Closed</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @unless ($book->book_cover_path === null)
                                                                <img src="{{ asset('storage/book_covers/' . $book->book_cover_path) }}"
                                                                    alt="{{ $book->title }}" width="100">
                                                            @else
                                                                <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable"
                                                                    alt="No Image" width="100">
                                                            @endunless
                                                        </td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">


                                                            <a href="{{ route('proposal.show', $book->id) }}"
                                                                class="text-white bg-indigo-500 hover:bg-indigo-600  focus:outline-none font-medium rounded text-sm px-2 py-1 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 mb-2">
                                                                <i data-lucide="eye"></i></a>
                                                            <a href="{{ route('proposal.edit', $book->id) }}"
                                                                class="text-white bg-primary-500 hover:bg-primary-600  focus:outline-none font-medium rounded text-sm px-2 py-1 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 mb-2">
                                                                <i data-lucide="pencil"></i></a>
                                                            <form id="deleteForm{{ $book->id }}"
                                                                action="{{ route('proposal.destroy', $book->id) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
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

                            @include('pages.proposal.admin.active', [
                                'activeProposals' => $activeProposals,
                            ])
                        @role('admin')
                            @include('pages.proposal.admin.queue', ['queueProposals' => $queueProposals])
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
