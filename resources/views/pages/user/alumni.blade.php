<div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="drafts" role="tabpanel"
    aria-labelledby="published-tab">
    <div class="grid grid-cols-1 p-4">
        <div class="sm:-mx-6 lg:-mx-8">
            <div class="relative overflow-x-auto block w-full sm:px-6 lg:px-8">
                <table class="w-full border-collapse" id="datatable_1_3">
                    <thead class="bg-slate-100 dark:bg-slate-700/20">
                        <tr>
                            <th class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase"
                                scope="col"></th>
                            <th scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                Nama
                            </th>
                            <th scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                NIM
                            </th>
                            <th scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                Angkatan
                            </th>
                            <th scope="col"
                                class="p-3 text-xs font-medium tracking-wider text-left text-gray-700 dark:text-gray-400 uppercase">
                                Action
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <!-- 1 -->
                        @foreach ($alumni as $index => $item)
                            <tr class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
                                <th class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400"
                                    scope="row">{{ $index + 1 }}</th>
                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $item->name }}</td>
                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $item->nim }}</td>

                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ '20' . substr($item->nim, 3, 2) }}</td>

                                <td class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    @role('admin')
                                        {{-- <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a> --}}
                                        <form id="deleteForm{{ $item->id }}"
                                            action="{{ route('user.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-white bg-red-500 hover:bg-red-600  focus:outline-none font-medium rounded text-sm px-2 py-1 text-center inline-flex items-center dark:bg-red-600 dark:hover:bg-red-700 mb-2"><i
                                                    data-lucide="trash"></i></button>
                                        </form>
                                    @endrole

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

<script>
    // deletion modal
    document.querySelectorAll('.delete-user').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Hentikan aksi default dari form

            const confirmation = window.confirm('Apakah Anda yakin ingin menghapus dosen ini?');
            if (confirmation) {
                const form = this.closest('form');
                form.submit(); // Kirim form DELETE ke server
            }
        });
    });
</script>
