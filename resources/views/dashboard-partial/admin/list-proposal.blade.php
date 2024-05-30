<div class="col-span-12 sm:col-span-12  md:col-span-12 lg:col-span-6 xl:col-span-6 ">
    <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900   rounded-md w-full relative">
        <div class="border-b border-dashed border-slate-200 dark:border-slate-700 py-4 px-4 dark:text-slate-300/70">
            <h4 class="font-medium flex-1 self-center mb-2 md:mb-0 text-xxl">List Proposal</h4>
            <p class="text-sm  text-slate-400">Proposal Perlu Diproses
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
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookProposals as $index => $book)
                                <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700/40">
                                    <td class="p-3 text-base  text-gray-600 dark:text-gray-400">
                                        {{ $book->book_title }}
                                    </td>
                                    <td class="p-3 text-base text-gray-500 dark:text-gray-400">
                                        {{ $book->book_author }}
                                    </td>
                                    <td class="p-3 text-base text-gray-500 dark:text-gray-400">
                                        <span class="text-red-500">{{ $book->category->name }}</span>
                                    </td>
                                    <td class="p-3 text-base text-gray-700 dark:text-gray-400">
                                        <span
                                            class="bg-yellow-500/10 text-yellow-500 text-[11px] font-medium mr-1 px-2.5 py-0.5 rounded ">{{ $book->status }}</span>

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
