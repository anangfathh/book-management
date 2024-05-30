<div
    class="min-h-full z-[99]  fixed inset-y-0 print:hidden bg-gradient-to-t from-[#6f3dc3] from-10% via-[#603dc3] via-40% to-[#5c3dc3] to-100% dark:bg-[#603dc3] main-sidebar duration-300 group-data-[sidebar=dark]:bg-[#603dc3] group-data-[sidebar=brand]:bg-brand group-[.dark]:group-data-[sidebar=brand]:bg-[#603dc3]">
    <div
        class=" text-center border-b bg-[#603dc3] border-r h-[64px] flex justify-center items-center brand-logo dark:bg-[#603dc3] dark:border-slate-700/40 group-data-[sidebar=dark]:bg-[#603dc3] group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:bg-brand group-[.dark]:group-data-[sidebar=brand]:bg-[#603dc3] group-data-[sidebar=brand]:border-slate-700/40">
        <a href="{{ route('dashboard') }}" class="logo">
            <span>
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small"
                    class="logo-sm h-8 align-middle inline-block">
            </span>
            <span>

                <h1 style="color: white;"
                    class="logo-lg h-[28px] logo-light hidden dark:inline-block ms-1 group-data-[sidebar=dark]:inline-block group-data-[sidebar=brand]:inline-block">
                    Book Management</h1> <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large"
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
                        @if (Auth::check())
                            <a href="{{ route('dashboard') }}"
                                class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                                <span data-lucide="home"
                                    class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                                <span>Dashboard</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                                <span data-lucide="log-in"
                                    class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                                <span>Login</span>
                            </a>
                        @endif


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

                        @role('admin')
                            <a href="{{ route('mahasiswa.list') }}"
                                class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                                <span data-lucide="user"
                                    class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                                <span>User</span>
                            </a>
                        @endrole


                        @auth

                            <a href="{{ route('proposal.list') }}"
                                class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                                <span data-lucide="folder-input"
                                    class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                                <span>Proposal</span>
                            </a>

                            {{-- End  --}}



                            <a href="{{ route('donation.list') }}"
                                class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                                <span data-lucide="book-up"
                                    class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                                <span>Donasi</span>
                            </a>
                            {{-- End  --}}


                            @if(Auth::user()->role === 'admin' || Auth::user()->role === 'dosen')
                            <a href="{{ route('loan.list') }}"
                                class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200 ">
                                <span data-lucide="book-open-check"
                                    class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                                <span>Pinjam</span>
                            </a>
                            @endif

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
                        @endauth


                    </div>
                </li>
            </ul>

        </div>
    </div>
</div>
