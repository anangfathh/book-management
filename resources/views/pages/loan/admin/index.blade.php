{{-- @extends('layouts.master')

@section('content')
    <h1>Book Loan Pending List</h1>
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
                <td>{{ $loan->jumlah}}</td>
                <td>{{ $loan->loan_date }}</td>
                <td>
                    {{ $loan->deadline_date }}
                </td>
                <td>
                    <a href="{{ route('loan.show', $loan->id) }}" class="btn btn-primary btn-sm">View</a>
                    <form action="{{ route('loan.validation', $loan->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="borrowed">
                        <button type="button" class="btn btn-success accept-loan"><i class="bi bi-check-lg"></i></button>
                    </form>
                    <form action="{{ route('loan.validation', $loan->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="rejected">
                        <button type="button" class="btn btn-danger reject-loan" id="reject-loan"><i class="bi bi-x-lg"></i></button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}


<div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-900" id="published" role="tabpanel"
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

                        @foreach ($queueLoans as $index => $loan)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>

                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $loan->book->title }}</td>
                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $loan->user->name }}</td>

                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    @if ($loan->borrowed_status == 'borrowed')
                                        <span
                                            class="bg-green-500/10 text-green-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Borrowed</span>
                                    @elseif($loan->borrowed_status == 'pending')
                                        <span
                                            class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Pending</span>
                                    @elseif($loan->borrowed_status == 'rejected')
                                        <span
                                            class="bg-red-500/10 text-red-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Rejected</span>
                                    @else
                                        <span
                                            class="bg-indigo-500/10 text-indigo-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">Returned</span>
                                    @endif
                                </td>
                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $loan->jumlah }}</td>
                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $loan->loan_date }}</td>
                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $loan->deadline_date }}
                                </td>
                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    <a href="{{ route('loan.show', $loan->id) }}"
                                        class="text-white bg-indigo-500 hover:bg-indigo-600  focus:outline-none font-medium rounded text-sm px-2 py-1 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 mb-2">
                                        <i data-lucide="eye"></i></a>
                                    <form action="{{ route('loan.validation', $loan->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="borrowed">
                                        <button type="button" id="accept-loan"
                                            class="accept-loan text-white
                                                                    bg-green-500 hover:bg-green-600 focus:outline-none
                                                                    font-medium rounded text-sm px-2 py-1 text-center
                                                                    inline-flex items-center dark:bg-green-600
                                                                    dark:hover:bg-green-700 mb-2"><i
                                                data-lucide="check"></i>accept</button>
                                    </form>
                                    <form action="{{ route('loan.validation', $loan->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="status" value="rejected">
                                        <button type="button"
                                            class="text-white
                                                                    bg-red-500 hover:bg-red-600 focus:outline-none
                                                                    font-medium rounded text-sm px-2 py-1 text-center
                                                                    inline-flex items-center dark:bg-red-600
                                                                    dark:hover:bg-red-700 mb-2 reject-loan"
                                            id="reject-loan"><i data-lucide="trash"></i>delete</button>
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


@section('pagescripts')
    <script>
        // deletion modal
        document.querySelectorAll('.reject-loan').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Hentikan aksi default dari form

                const confirmation = window.confirm('Apakah Anda yakin mereject peminjaman buku ini?');
                if (confirmation) {
                    const form = this.closest('form');
                    form.submit(); // Kirim form DELETE ke server
                }
            });
        });
        document.querySelectorAll('.accept-loan').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Hentikan aksi default dari form

                const confirmation = window.confirm('Apakah Anda yakin menyetujui peminjaman buku ini?');
                if (confirmation) {
                    const form = this.closest('form');
                    form.submit(); // Kirim form DELETE ke server
                }
            });
        });
    </script>
@endsection
