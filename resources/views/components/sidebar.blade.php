 <div
     class="min-h-full z-[99]  fixed inset-y-0 print:hidden bg-gradient-to-t from-[#6f3dc3] from-10% via-[#603dc3] via-40% to-[#5c3dc3] to-100% dark:bg-[#603dc3] main-sidebar duration-300 group-data-[sidebar=dark]:bg-[#603dc3] group-data-[sidebar=brand]:bg-brand group-[.dark]:group-data-[sidebar=brand]:bg-[#603dc3]">
     <div
         class=" text-center border-b bg-[#603dc3] border-r h-[64px] flex justify-center items-center brand-logo dark:bg-[#603dc3] dark:border-slate-700/40 group-data-[sidebar=dark]:bg-[#603dc3] group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:bg-brand group-[.dark]:group-data-[sidebar=brand]:bg-[#603dc3] group-data-[sidebar=brand]:border-slate-700/40">
         <a href="index.html" class="logo">
             <span>
                 <img src="assets/images/logo-sm.png" alt="logo-small" class="logo-sm h-8 align-middle inline-block">
             </span>
             <span>
                 <img src="assets/images/logo.png" alt="logo-large"
                     class="logo-lg h-[28px] logo-light hidden dark:inline-block ms-1 group-data-[sidebar=dark]:inline-block group-data-[sidebar=brand]:inline-block">
                 <img src="assets/images/logo.png" alt="logo-large"
                     class="logo-lg h-[28px] logo-dark inline-block dark:hidden ms-1 group-data-[sidebar=dark]:hidden group-data-[sidebar=brand]:hidden">
             </span>
         </a>
     </div>
     <div class="border-r pb-14 h-[100vh] dark:bg-[#603dc3] dark:border-slate-700/40 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"
         data-simplebar>
         <div class="p-4 block">
             <ul class="navbar-nav">

                 <li>
                     <div id="parent-accordion" data-fc-type="accordion">
                         <a href="{{ route('dashboard') }}"
                             class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                             <span data-lucide="home"
                                 class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                             <span>Dashboard</span>
                         </a>
                         <div
                             class="border-b border-dashed dark:border-slate-700/40 my-3 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40">
                         </div>
                         <div
                             class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500 group-data-[sidebar=brand]:text-slate-400">
                             N<span>avigasi Menu </span>
                         </div>
                         <a href="{{ route('books.list') }}"
                             class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                             <span data-lucide="book-copy"
                                 class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                             <span>Book</span>
                         </a>

                         <a href="#"
                             class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                             <span data-lucide="user"
                                 class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                             <span>User</span>
                         </a>

                         {{-- Proposal --}}
                         {{-- <div data-fc-type="collapse" data-fc-parent="parent-accordion">
                             <a href="#"
                                 class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                                 <span data-lucide="folder-input"
                                     class="w-5 h-5 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                                 <span>Proposal</span>
                                 <i
                                     class="icofont-thin-down fc-collapse-open:rotate-180 ms-auto inline-block text-[14px] transform transition-transform duration-300 text-slate-800 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></i>
                             </a>
                         </div> --}}
                         {{-- <div class="hidden  overflow-hidden">
                             <ul class="nav flex-col flex flex-wrap ps-0 mb-0 ms-2" id="apps-accordion"
                                 data-fc-type="accordion">

                                 <li class="nav-item relative block">
                                     <a href="{{ route('proposal.list') }}"
                                         class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                         <i
                                             class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                         List Proposal
                                     </a>
                                 </li>
                                 @role('admin')
                                     <li class="nav-item relative block">
                                         <a href="{{ route('proposal.queue') }}"
                                             class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                             <i
                                                 class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                             Proposal Queue
                                         </a>
                                     </li>
                                     <li class="nav-item relative block">
                                         <a href="{{ route('proposal.active') }}"
                                             class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                             <i
                                                 class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                             Proposal Aktif
                                         </a>
                                     </li>
                                 @endrole

                             </ul>
                         </div> --}}


                         <a href="{{ route('proposal.list') }}"
                             class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                             <span data-lucide="folder-input"
                                 class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                             <span>User</span>
                         </a>
                         {{-- End  --}}

                         {{-- Donasi --}}
                         {{-- <div data-fc-type="collapse" data-fc-parent="parent-accordion">
                             <a href="#"
                                 class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                                 <span data-lucide="book-up"
                                     class="w-5 h-5 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                                 <span>Donasi</span>
                                 <i
                                     class="icofont-thin-down fc-collapse-open:rotate-180 ms-auto inline-block text-[14px] transform transition-transform duration-300 text-slate-800 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></i>
                             </a>
                         </div>
                         <div class="hidden  overflow-hidden">
                             <ul class="nav flex-col flex flex-wrap ps-0 mb-0 ms-2" id="apps-accordion"
                                 data-fc-type="accordion">

                                 <li class="nav-item relative block">
                                     <a href="{{ route('donation.list') }}"
                                         class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                         <i
                                             class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                         Riwayat Donasi
                                     </a>
                                 </li>
                                 @role('admin')
                                     <li class="nav-item relative block">
                                         <a href="{{ route('donation.queue') }}"
                                             class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                             <i
                                                 class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                             Butuh Persetujuan
                                         </a>
                                     </li>
                                 @endrole
                             </ul>
                         </div> --}}

                         <a href="{{ route('donation.list') }}"
                             class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                             <span data-lucide="book-up"
                                 class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                             <span>User</span>
                         </a>
                         {{-- End  --}}

                         {{-- Peminjaman --}}
                         {{-- <div data-fc-type="collapse" data-fc-parent="parent-accordion">
                             <a href="#"
                                 class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                                 <span data-lucide="book-open-check"
                                     class="w-5 h-5 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                                 <span>Peminjaman</span>
                                 <i
                                     class="icofont-thin-down fc-collapse-open:rotate-180 ms-auto inline-block text-[14px] transform transition-transform duration-300 text-slate-800 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></i>
                             </a>
                         </div>
                         <div class="hidden  overflow-hidden">
                             <ul class="nav flex-col flex flex-wrap ps-0 mb-0 ms-2" id="apps-accordion"
                                 data-fc-type="accordion">
                                 @role('dosen')
                                     <li class="nav-item relative block">
                                         <a href="{{ route('loan.list') }}"
                                             class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                             <i
                                                 class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                             Riwayat Peminjaman
                                         </a>
                                     </li>
                                 @endrole

                                 @role('admin')
                                     <li class="nav-item relative block">
                                         <a href="{{ route('loan.queue') }}"
                                             class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                             <i
                                                 class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                             Butuh Persetujuan
                                         </a>
                                     </li>
                                     <li class="nav-item relative block">
                                         <a href="{{ route('loan.active') }}"
                                             class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                             <i
                                                 class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                             Dalam Peminjaman
                                         </a>
                                     </li>
                                 @endrole
                             </ul>
                         </div> --}}

                         <a href="{{ route('donation.list') }}"
                             class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                             <span data-lucide="book-open-check"
                                 class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                             <span>User</span>
                         </a>
                         {{-- End  --}}

                         <a href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                             class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                             <span data-lucide="power-off"
                                 class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                             <span>Logout</span>
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </div>
                 </li>
             </ul>

         </div>
     </div>
 </div>
