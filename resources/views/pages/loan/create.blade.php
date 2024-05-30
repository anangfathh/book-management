@extends('layouts.app')
@section('content')
    <h1>Formulir Peminjaman</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <form class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 justify-between"
            action="{{ route('loan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-6 xl:col-span-6">
                <div class="w-full relative mb-4">
                    <div class="flex-auto p-0 md:p-4">
                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400" for="book_id">Book
                                Title</label>
                            <input type="text" name="book_id" id="book_id"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700 form-control @error('title') is-invalid @enderror"
                                value="{{ $book->id }}" hidden>
                            <input type="text" name="book_title" id="book_id"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700 form-control @error('title') is-invalid @enderror"
                                value="{{ $book->title }}" readonly>
                            @error('book_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400" for="loan_date">Tanggal
                                Peminjaman</label>
                            <input type="date" name="loan_date" id="loan_date"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700 form-control @error('loan_date') is-invalid @enderror"
                                value="{{ old('loan_date') }}" required>
                            @error('loan_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="deadline_date">Peminjaman
                                Hingga</label>
                            <input type="date" name="deadline_date" id="deadline_date"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700 form-control @error('deadline_date') is-invalid @enderror"
                                value="{{ old('deadline_date') }}" required>
                            @error('deadline_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400" for="jumlah">Jumlah
                                Buku</label>
                            <input type="number" name="jumlah" id="jumlah"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700 form-control @error('jumlah') is-invalid @enderror"
                                value="{{ old('jumlah') }}" max="{{ $book->jumlah }}" min="0">
                            @error('jumlah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
            <div class="flex flex-col w-full gap-5 justify-center">
                <button type="submit"
                    class="px-2 py-2 lg:px-4 bg-brand  text-white text-sm  rounded hover:bg-brand-600 border border-brand-500">Create</button>

                <a href="{{ route('books.list') }}"
                    class="px-2 py-2 lg:px-4 bg-transparent  text-brand text-sm  rounded transition hover:bg-brand-500 hover:text-white border border-brand font-medium">Back
                </a>
            </div>
        </form>
    </div> <!--end grid-->
@endsection

@section('pagescripts')
    <script>
        document.getElementById('jenis').addEventListener('change', function() {
            if (this.value === 'softfile') {
                document.getElementById('pdf-path-field').style.display = 'block';
            } else {
                document.getElementById('pdf-path-field').style.display = 'none';
            }
        });
    </script>
@endsection
