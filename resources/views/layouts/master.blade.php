<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- for dropdown searching option --}}
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('books.list') }}">
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('books.list') }}">
                                    Books
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="proposalDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Proposal
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="proposalDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('proposal.list') }}">
                                            Proposal
                                        </a>
                                    </li>
                                    @role('admin')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('proposal.queue') }}">
                                            Proposal Queue
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('proposal.active') }}">
                                            Proposal Aktif
                                        </a>
                                    </li>
                                    @endrole
                                </ul>
                            </li>

                            @role('admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    user
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('mahasiswa.list') }}">
                                            Mahasiswa
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('dosen.list') }}">
                                            Dosen
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('alumni.list') }}">
                                            Alumni
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endrole
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="donasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Donasi
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="donasiDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('donation.list') }}">
                                            Riwayat Donasi
                                        </a>
                                    </li>
                                    @role('admin')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('donation.queue') }}">
                                            Butuh Persetujuan
                                        </a>
                                    </li>
                                    @endrole
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="peminjamanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Peminjaman
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="peminjamanDropdown">
                                    @role('dosen')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('loan.list') }}">
                                            Riwayat Peminjaman
                                        </a>
                                    </li>
                                    @endrole
                                    @role('admin')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('loan.queue') }}">
                                            Butuh Persetujuan 
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('loan.active') }}">
                                            Dalam Peminjaman
                                        </a>
                                    </li>
                                    @endrole
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @yield('pagescripts')
</body>
</html>