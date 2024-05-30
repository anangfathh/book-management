<div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 ">
    <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900   rounded-md w-full relative">
        <div class="border-b border-dashed border-slate-200 dark:border-slate-700 py-4 px-4 dark:text-slate-300/70">
            <h4 class="font-medium flex-1 self-center mb-2 md:mb-0 text-xxl">Daftar Buku</h4>
            <p class="text-sm text-slate-400">6 Buku Teratas
            </p>
        </div><!--end header-title-->
        <div class="grid grid-cols-1 p-4">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                    <table class="w-full">
                        <thead class="bg-brand-400/10 dark:bg-slate-700/20">
                            <tr>
                                <th scope="col"
                                    class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400">
                                    Title
                                </th>
                                <th scope="col"
                                    class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400">
                                    Author
                                </th>
                                <th scope="col"
                                    class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400">
                                    Kategori
                                </th>
                                <th scope="col"
                                    class="p-3 text-base font-medium tracking-wider text-start text-gray-700 uppercase dark:text-gray-400">
                                    Cover
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $index => $book)
                                <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                                    <td class="p-3 text-base  text-gray-600  dark:text-gray-400">
                                        {{ $book->title }}
                                    </td>
                                    <td class="p-3 text-base text-gray-500  dark:text-gray-400">
                                        {{ $book->author }}
                                    </td>
                                    <td class="p-3 text-base text-gray-500  dark:text-gray-400">
                                        <span class="text-red-500">{{ $book->category->name }}</span>
                                    </td>
                                    <td class="p-3 text-base text-gray-700  dark:text-gray-400">
                                        <span class="font-semibold">
                                            @unless ($book->image_path === null)
                                                <img src="{{ asset('storage/cover_images/' . $book->image_path) }}"
                                                    alt="{{ $book->title }}" width="100">
                                            @else
                                                <img src="https://via.placeholder.com/640x480.png/F6F5F2?text=NoImageAvailable"
                                                    alt="No Image" width="100">
                                            @endunless
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!--end card-body-->
    </div> <!--end card-->
</div><!--end col-->
