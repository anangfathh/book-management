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
                                    Mahasiswa <span class="text-slate-400">{{ count($students) }}</span>
                                </button>
                            </li>
                            @role('admin')
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="published-tab" data-fc-target="#published" type="button" role="tab"
                                        aria-controls="published" aria-selected="false">
                                        Dosen <span class="text-slate-400">{{ count($lecturers) }}</span>
                                    </button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="drafts-tab" data-fc-target="#drafts" type="button" role="tab"
                                        aria-controls="drafts" aria-selected="false">
                                        Alumni <span class="text-slate-400">{{ count($alumni) }}</span>
                                    </button>
                                </li>
                            @endrole
                        </ul>
                    </div>
                    <div class="flex flex-wrap gap-4 mb-3">
                        <div class="mb-2 w-44">

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


                                                @foreach ($students as $index => $item)
                                                    <tr
                                                        class="bg-white border-b border-dashed dark:bg-gray-900 dark:border-gray-700">
                                                        <th class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400"
                                                            scope="row">{{ $index + 1 }}</th>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $item->name }}</td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $item->nim }}</td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ '20' . substr($item->nim, 3, 2) }}</td>
                                                        <td
                                                            class="p-3 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            @role('admin')
                                                                {{-- <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a> --}}
                                                                <form id="deleteForm{{ $item->id }}"
                                                                    action="{{ route('user.destroy', $item->id) }}"
                                                                    method="POST" class="d-inline">
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
                        @role('admin')
                            @include('pages.user.dosen', [
                                'lecturers' => $lecturers,
                            ])
                            @include('pages.user.alumni', ['alumni' => $alumni])
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
        document.querySelectorAll('.delete-user').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Hentikan aksi default dari form

                const confirmation = window.confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?');
                if (confirmation) {
                    const form = this.closest('form');
                    form.submit(); // Kirim form DELETE ke server
                }
            });
        });
    </script>
@endsection
