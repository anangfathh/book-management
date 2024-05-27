@extends('layouts.app')

@section('content')
    <div>
        <form class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 justify-between"
            action="{{ route('donation.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-3 xl:col-span-3">
                <div class="w-full relative p-4">
                    <label for="image_path" class="font-medium text-sm text-slate-600 dark:text-slate-400">Upload
                        Image</label>
                    <div class="w-full h-56 mx-auto  mb-4">
                        <input type="file" name="image_path" id="image_path"
                            class="form-control-file @error('image_path') is-invalid @enderror">
                        @error('image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div><!--end card-->
            </div><!--end col-->

            <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-6 xl:col-span-6">
                <div class="w-full relative mb-4">
                    <div class="flex-auto p-0 md:p-4">
                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400" for="title">Book
                                Title</label>
                            <input type="text" name="title" id="title"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="author">Author</label>
                            <input type="text" name="author" id="author"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('author') is-invalid @enderror"
                                value="{{ old('author') }}" required>
                            @error('author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="publication_year">Publication Year</label>
                            <input type="text" name="publication_year" id="publication_year"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('publication_year') is-invalid @enderror"
                                value="{{ old('publication_year') }}" required>
                            @error('publication_year')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="publisher_id">Publisher</label>
                            <select name="publisher_id" id="searchable-dropdown"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('publisher_id') is-invalid @enderror"
                                required>
                                <option value="" selected disabled>Not selected</option>
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}"
                                        {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>
                                        {{ $publisher->name }}</option>
                                @endforeach
                                <option value="more">Add New Publisher</option>
                            </select>
                            @error('publisher_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="custom-option-form" class="form-group" style="display: none;">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="custom-option-name">Publisher Name</label>
                            <input type="text" name="publisher_name" id="custom-option-name"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('publisher_name') is-invalid @enderror">
                            @error('publisher_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="custom-option-address">Publisher Address</label>
                            <input type="text" name="publisher_address" id="custom-option-address"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('publisher_address') is-invalid @enderror">
                            @error('publisher_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="custom-option-phone">Publisher Phone</label>
                            <input type="text" name="publisher_phone" id="custom-option-phone"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('publisher_phone') is-invalid @enderror">
                            @error('publisher_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" id="jumlah"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('jumlah') is-invalid @enderror"
                                value="{{ old('jumlah') }}" required>
                            @error('jumlah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="category_id">Category</label>
                            <select name="category_id" id="category_id"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('category_id') is-invalid @enderror"
                                required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="jenis">Jenis</label>
                            <select name="jenis" id="jenis"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('jenis') is-invalid @enderror"
                                required>
                                <option value="" selected disabled>Not selected</option>
                                <option value="softfile" {{ old('jenis') == 'softfile' ? 'selected' : '' }}>Softfile
                                </option>
                                <option value="hardfile" {{ old('jenis') == 'hardfile' ? 'selected' : '' }}>Hardfile
                                </option>
                            </select>
                            @error('jenis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="pdf-path-field" class="form-group" style="display: none;">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400" for="pdf_path">PDF
                                Path</label>
                            <input type="file" name="pdf_path" id="pdf_path"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control-file @error('pdf_path') is-invalid @enderror">
                            @error('pdf_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->



            <div class="flex flex-col w-full gap-5 justify-center"><button type="submit"
                    class="px-2 py-2 lg:px-4 bg-brand  text-white text-sm  rounded hover:bg-brand-600 border border-brand-500">Create</button>

                <a href="{{ route('donation.list') }}"
                    class="px-2 py-2 lg:px-4 bg-transparent  text-brand text-sm  rounded transition hover:bg-brand-500 hover:text-white border border-brand font-medium">Back
                </a>
            </div>
        </form>
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

            $(document).ready(function() {
                $('#searchable-dropdown').select2({
                    placeholder: "Select a state",
                    allowClear: true
                });

                $('#searchable-dropdown').on('change', function() {
                    if (this.value === 'more') {
                        $('#custom-option-form').show();
                    } else {
                        $('#custom-option-form').hide();
                    }
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Select the dropdown
                var dropdown = document.getElementById('searchable-dropdown');
                // Select the form group for add manually
                var customOptionForm = document.getElementById('custom-option-form');

                // Add event listener to the dropdown
                dropdown.addEventListener('change', function() {
                    // Check if the selected value is 'more'
                    if (this.value === 'more') {
                        // Display the form group for add manually
                        customOptionForm.style.display = 'block';
                    } else {
                        // Hide the form group for add manually
                        customOptionForm.style.display = 'none';
                    }
                });
            });
        </script>
        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);
            // Get a reference to the file input element
            const inputElement = document.querySelectorAll('input[type="file"]');

            // Create a FilePond instance
            inputElement.forEach(element => {
                const pond = FilePond.create(element);
            });


            var elem = document.querySelector('input[name="foo"]');
            new Datepicker(elem, {
                // ...options
            });
            new Selectr('#sizing', {
                taggable: true,
                tagSeperators: [",", "|"]
            });
        </script>
    @endsection
