@extends('layouts.app')
@section('content')
    <div class="xl:w-full">
        <div class="flex flex-wrap">
            <div class="flex items-center py-4 w-full">
                <div class="w-full">
                    <div class="">
                        <div class="flex flex-wrap justify-between">
                            <div class="items-center ">
                                <h1 class="font-medium text-3xl block dark:text-slate-100">Welcome!</h1>
                                <ol class="list-reset flex text-sm">
                                    <li><a href="#" class="text-gray-500 dark:text-slate-400">BookManagement</a>
                                    </li>
                                    <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                    <li class="text-gray-500 dark:text-slate-400">Dashboard</li>
                                    <li><span class="text-gray-500 dark:text-slate-400 mx-2">/</span></li>
                                </ol>
                            </div>
                            <div class="flex items-center">
                                <div
                                    class="today-date leading-5 mt-2 lg:mt-0 form-input w-auto rounded-md border inline-block border-primary-500/60 dark:border-primary-500/60 text-primary-500 bg-transparent px-3 py-1 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-primary-400 focus:border-primary-500 dark:focus:border-primary-500  dark:hover:border-slate-700">
                                    <input type="text" class="dash_date border-0 focus:border-0 focus:outline-none"
                                        readonly required="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end container-->

    <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3">
            <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                <div class="flex-auto p-4">
                    <div class="flex justify-between xl:gap-x-2 items-cente">
                        <div class="self-center">
                            <p class="text-gray-800 font-semibold dark:text-slate-400 text-lg uppercase">
                                Buku Tersedia</p>
                            <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">{{ $booksCount }}</h3>
                        </div>
                        <div class="self-center">
                            <i data-lucide="library" class=" h-16 w-16 stroke-primary-500/30"></i>
                        </div>
                    </div>
                    <p class="truncate text-slate-400"><span class="text-green-500"><i
                                class="mdi mdi-trending-up"></i>{{ $newbooksCount }}</span> Buku Baru Dalam 7 Hari
                        Terakhir</p>
                </div><!--end card-body-->
                <div class="flex-auto p-0 overflow-hidden">
                </div><!--end card-body-->
            </div> <!--end inner-grid-->
        </div><!--end col-->
        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
            <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                <div class="flex-auto p-4">
                    <div class="flex justify-between xl:gap-x-2 items-cente">
                        <div class="self-center">
                            <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Proposal Diterima</p>
                            <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">{{ $totalProposals }}</h3>
                        </div>
                        <div class="self-center">
                            <i data-lucide="users" class=" h-16 w-16 stroke-green/30"></i>
                        </div>
                    </div>
                    <p class="truncate text-slate-400"><span class="text-red-500"><i
                                class="mdi mdi-trending-down"></i>{{ $queueProposals }}</span> Proposal Diproses</p>
                </div><!--end card-body-->
                <div class="flex-auto p-0 overflow-hidden">

                </div><!--end card-body-->
            </div> <!--end inner-grid-->
        </div><!--end col-->
        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-3 xl:col-span-3">
            <div class="bg-white shadow-sm dark:shadow-slate-700/10 dark:bg-gray-900  rounded-md w-full relative mb-4">
                <div class="flex-auto p-4">
                    <div class="flex justify-between xl:gap-x-2 items-cente">
                        <div class="self-center">
                            <p class="text-gray-800 font-semibold dark:text-slate-400 uppercase">Pengguna</p>
                            <h3 class="my-4 font-semibold text-[30px] dark:text-slate-200">{{ $totalUser }}</h3>
                        </div>
                        <div class="self-center">
                            <i data-lucide="gem" class=" h-16 w-16 stroke-yellow-500/30"></i>
                        </div>
                    </div>

                </div><!--end card-body-->
                <div class="flex-auto p-0 overflow-hidden">

                </div><!--end card-body-->
            </div> <!--end inner-grid-->
        </div>

    </div> <!--end grid-->

    <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4">
        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4">
            <div class="w-full relative mb-4">
                <div class="flex-auto p-4">


                    <div class="border-b border-dashed border-slate-300 dark:border-slate-700/40 my-3">
                    </div>
                    <div class="grid grid-cols-12 gap-4 mb-8">
                        <div class="col-span-12 sm:col-span-6">
                            <div id="email_report" class="apex-charts -mb-4"></div>
                        </div><!--end col-->
                        <div class="col-span-12 sm:col-span-6 self-center">
                            <ol class="list-none list-inside mb-3">
                                <li class="mb-1 text-slate-700 dark:text-slate-400 text-sm"><i
                                        class="icofont-ui-play me-2 text-brand-500"></i> Tablet</li>
                                <li class="mb-1 text-slate-700 dark:text-slate-400 text-sm"><i
                                        class="icofont-ui-play me-2 text-yellow-400"></i> Desktop</li>
                                <li class="mb-1 text-slate-700 dark:text-slate-400 text-sm"><i
                                        class="icofont-ui-play me-2 text-[#13939c]"></i> Moble</li>
                            </ol>
                            <button type="button"
                                class="inline-block shadow-sm dark:shadow-slate-700/10 focus:outline-none text-slate-600 hover:bg-brand-500 hover:text-white bg-transparent border border-slate-300 dark:bg-transparent dark:text-slate-400 dark:hover:text-white dark:border-gray-700 dark:hover:bg-brand-500  text-sm font-medium py-1 px-3 rounded">View
                                Details <i class="mdi mdi-arrow-right"></i></button>
                        </div><!--end col-->
                    </div><!--end grid-->
                    <h6
                        class="bg-brand-400/5 shadow-sm dark:shadow-slate-700/10 border border-dashed dark:text-brand-300 border-brand dark:bg-slate-700/40 py-3 px-2 rounded-md  text-center text-brand-500 font-medium mt-3">
                        <i class="ti ti-calendar self-center text-lg mr-1"></i>
                        01 January 2023 to 31 December 2024
                    </h6>
                </div><!--end card-body-->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-8 xl:col-span-8">
            <div class="w-full relative mb-4">
                <div class="border-b border-dashed border-slate-200 dark:border-slate-700 py-3 px-4 dark:text-slate-300/70">
                    <div class="flex-none md:flex">
                        <h4 class="font-medium flex-1 self-center mb-2 md:mb-0 text-xxl">Sales Report</h4>
                        <div class="dropdown inline-block">
                            <button data-fc-autoclose="both" data-fc-type="dropdown"
                                class="dropdown-toggle px-3 py-1 text-xs font-medium text-gray-500 focus:outline-none bg-white rounded border border-gray-200 hover:bg-gray-50 hover:text-slate-800 focus:z-10 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                type="button">
                                This Month
                                <i class="fas fa-chevron-down text-xs ml-2"></i>
                            </button>
                            <!-- Dropdown menu -->
                            <div
                                class="right-auto md:right-0 hidden z-10 w-28 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            Week</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            Month</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-50 dark:hover:bg-gray-600 dark:hover:text-white">This
                                            Year</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-auto p-4">
                    <div id="crm-dash" class="apex-charts mt-5"></div>
                </div><!--end card-body-->
            </div> <!--end inner-grid-->
        </div><!--end col-->


    </div> <!--end grid-->

    <div class="grid grid-cols-12 sm:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 xl:grid-cols-12 gap-4 mb-4">
        @role('admin')
            @include('dashboard-partial.admin.book-list', [
                'books' => $books,
            ])
            @include('dashboard-partial.admin.list-proposal')
        @endrole

    </div><!--end inner-grid-->
@endsection
