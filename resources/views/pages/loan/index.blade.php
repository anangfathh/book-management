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
                                    Riwayat Peminjaman <span class="text-slate-400">(4251)</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="flex flex-wrap gap-4 mb-3">
                        <div class="mb-2 w-44">
                            {{-- <a href="{{ route('donation.create') }}"
                                class="inline-block focus:outline-none bg-brand-500 mt-1 text-white hover:bg-brand-600 hover:text-white text-md font-medium py-2 px-4 rounded">
                                Add product
                            </a> --}}
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
                                                        Peminjam
                                                    </th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                        Status
                                                    </th>
                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                        Jumlah Buku
                                                    </th>

                                                    <th scope="col"
                                                        class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                                        Cover
                                                    </th>

                                                    <th class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase"
                                                        scope="col">Deadline</th>
                                                    <th class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase"
                                                        scope="col">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- 1 -->

                                                @foreach ($bookLoans as $index => $loan)
                                                    <tr>
                                                        <th scope="row">{{ $index + 1 }}</th>

                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $loan->book->title }}</td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $loan->user->name }}</td>

                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            @if ($loan->borrowed_status == 'borrowed')
                                                                <span class="badge bg-info">Borrowed</span>
                                                            @elseif($loan->borrowed_status == 'pending')
                                                                <span class="badge bg-warning">Pending</span>
                                                            @elseif($loan->borrowed_status == 'rejected')
                                                                <span class="badge bg-danger">Rejected</span>
                                                            @else
                                                                <span class="badge bg-success">Returned</span>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $loan->jumlah }}</td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $loan->loan_date }}</td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $loan->deadline_date }}
                                                        </td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            <a href="{{ route('loan.show', $loan->id) }}"
                                                                class="btn btn-primary btn-sm">View</a>
                                                            @if ($loan->borrowed_status == 'pending')
                                                                <form id="deleteForm{{ $loan->id }}"
                                                                    action="{{ route('loan.destroy', $loan->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm delete-book">Delete</button>
                                                                </form>
                                                            @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                            <!--end grid-->
                        </div>





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

                const confirmation = window.confirm('Apakah Anda yakin ingin membatalkan peminjaman ini?');
                if (confirmation) {
                    const form = this.closest('form');
                    form.submit(); // Kirim form DELETE ke server
                }
            });
        });
    </script>
@endsection
