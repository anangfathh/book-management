@extends('layouts.app')
@section('content')
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
            action="{{ route('proposal.update', $bookProposal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-6 xl:col-span-6">
                <div class="w-full relative mb-4">
                    <div class="flex-auto p-0 md:p-4">
                        <div class="flex-auto py-4 ">
                            <div class="d-grid">
                                <p class="text-slate-400 mb-4">Click Upload Image Untuk Upload Gambar
                                </p>
                                <div hidden
                                    class="preview-box block justify-center rounded overflow-hidden bg-slate-50 dark:bg-slate-900/20 p-4 mb-4">
                                </div>
                                <input type="file" id="input-file" name="book_cover_path" accept="image/*"
                                    onchange={handleChange()} hidden />
                                <label
                                    class="btn-upload px-3 py-2 lg:px-4 bg-blue-500 text-white text-sm font-semibold rounded hover:bg-blue-600 mt-4"
                                    for="input-file">Upload Image</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="book_title">Title</label>
                            <input type="text" name="book_title" id="book_title"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700 form-control @error('book_title') is-invalid @enderror"
                                value="{{ $bookProposal->book_title }}" required>
                            @error('book_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="book_author">Author</label>
                            <input type="text" name="book_author" id="book_author"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700 form-control @error('book_author') is-invalid @enderror"
                                value="{{ $bookProposal->book_author }}" required>
                            @error('book_author')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="publisher_id">Publisher</label>
                            <select name="publisher" id="searchable-dropdown"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('publisher_id') is-invalid @enderror"
                                required>
                                <option value="" selected disabled>Not selected</option>
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}"
                                        {{ old('publisher_id') == $publisher->id ? 'selected' : '' }}>
                                        {{ $publisher->name }}</option>
                                @endforeach
                                <option value="more">Add Manually</option>
                            </select>
                            @error('publisher_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div id="custom-option-form" class="form-group" style="display: none;">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400" for="custom-option-name">Publisher
                                Name</label>
                            <input type="text" name="publisher_name" id="custom-option-name"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700 form-control @error('publisher_name') is-invalid @enderror">
                            @error('publisher_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400" for="custom-option-address">Publisher
                                Address</label>
                            <input type="text" name="publisher_address" id="custom-option-address"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700 form-control @error('publisher_address') is-invalid @enderror">
                            @error('publisher_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400" for="custom-option-phone">Publisher
                                Phone</label>
                            <input type="text" name="publisher_phone" id="custom-option-phone"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700 form-control @error('publisher_phone') is-invalid @enderror">
                            @error('publisher_phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="book_price">Price</label>
                            <input type="number" name="book_price" id="book_price"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-brand-500 dark:focus:border-brand-500  dark:hover:border-slate-700 form-control @error('book_price') is-invalid @enderror"
                                value="{{ $bookProposal->book_price }}" required>
                            @error('book_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="reason">Alasan Pengajuan</label>
                            <textarea name="reason" id="reason"
                                class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('reason') is-invalid @enderror"
                                required>{{ $bookProposal->reason }}</textarea>
                            @error('reason')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400"
                                for="category_id">Category</label>
                            <select name="category_id" id="category_id"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('category_id') is-invalid @enderror"
                                required>
                                @foreach ($bookCategories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-medium text-sm text-slate-600 dark:text-slate-400" for="book_type">Book
                                Type</label>
                            <select name="book_type" id="book_type"
                                class="w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700 form-control @error('book_type') is-invalid @enderror"
                                required>
                                <option value="" selected disabled>Not selected</option>
                                <option value="softfile" {{ old('book_type') == 'softfile' ? 'selected' : '' }}>Softfile
                                </option>
                                <option value="hardfile" {{ old('book_type') == 'hardfile' ? 'selected' : '' }}>Hardfile
                                </option>
                            </select>
                            @error('book_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->


            <div class="flex flex-col w-full gap-5 justify-center"><button type="submit"
                    class="px-2 py-2 lg:px-4 bg-brand  text-white text-sm  rounded hover:bg-brand-600 border border-brand-500">Edit</button>

                <a href="{{ route('proposal.list') }}"
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
