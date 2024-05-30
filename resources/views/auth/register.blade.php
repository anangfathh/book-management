<!DOCTYPE html>
<html lang="en" class="scroll-smooth group" data-sidebar="brand" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Book Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta content="Tailwind Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="Mannatthemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <!-- Css -->
    <!-- Main Css -->
    <link rel="stylesheet" href="assets/libs/icofont/icofont.min.css" />
    <link href="assets/libs/flatpickr/flatpickr.min.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/tailwind.min.css" />
</head>

<body data-layout-mode="light" data-sidebar-size="default" data-theme-layout="vertical"
    class="bg-[#EEF0FC] dark:bg-gray-900">
    <div class="relative flex flex-col justify-center min-h-screen overflow-hidden">
        <div
            class="w-full m-auto bg-white dark:bg-slate-800/60 rounded shadow-lg ring-2 ring-slate-300/50 dark:ring-slate-700/50 lg:max-w-md">
            <div class="text-center p-6 bg-slate-900 rounded-t">
                <a href="index.html"><img src="assets/images/logo-sm.png" alt=""
                        class="w-14 h-14 mx-auto mb-2" /></a>
                <h3 class="font-semibold text-white text-xl mb-1">
                    Let's Get Started
                </h3>
                <p class="text-xs text-slate-400">Sign in to use Dashboard.</p>
            </div>
                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

            <form class="p-6" method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <label for="name"
                        class="font-medium text-sm text-slate-600 dark:text-slate-400">Username</label>
                    <input type="text" id="name" name="name"
                        class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700"
                        placeholder="Enter Username" required />
                </div>
                <div class="mt-2">
                    <label for="email" class="font-medium text-sm text-slate-600 dark:text-slate-400">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700"
                        placeholder="Enter Email" required />
                </div>
                <div class="mt-2">
                    <label for="password" class="font-medium text-sm text-slate-600 dark:text-slate-400">Your
                        password</label>
                    <input type="password" name="password" id="password"
                        class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700"
                        placeholder="Enter Password" required />
                </div>
                <div class="mt-2">
                    <label for="password_confirmation"
                        class="font-medium text-sm text-slate-600 dark:text-slate-400">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-input w-full rounded-md mt-1 border border-slate-300/60 dark:border-slate-700 dark:text-slate-300 bg-transparent px-3 py-2 focus:outline-none focus:ring-0 placeholder:text-slate-400/70 placeholder:font-normal placeholder:text-sm hover:border-slate-400 focus:border-primary-500 dark:focus:border-primary-500 dark:hover:border-slate-700"
                        placeholder="Enter Confirm Password" required />
                </div>

                <!-- Choose Role -->
                <div class="mt-4">
                    <x-input-label for="role" :value="__('Register As')" />

                    <select id="role" class="block mt-1 w-full" name="role" required>
                        <option>Not Selected</option>
                        @foreach (['mahasiswa', 'dosen', 'alumni'] as $role)
                            <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                        @endforeach
                    </select>

                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- NIP Field -->
                <div id="nip-field" class="mt-4" style="display: none">
                    <x-input-label for="nip" :value="__('NIP')" />
                    <input type="text" id="nip" name="nip" class="block mt-1 w-full" />
                    <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                </div>

                <!-- NIDN Field -->
                <div id="nidn-field" class="mt-4" style="display: none">
                    <x-input-label for="nidn" :value="__('NIDN')" />
                    <input type="text" id="nidn" name="nidn" class="block mt-1 w-full" />
                    <x-input-error :messages="$errors->get('nidn')" class="mt-2" />
                </div>

                <!-- NIM Field -->
                <div id="nim-field" class="mt-4" style="display: none">
                    <x-input-label for="nim" :value="__('NIM')" />
                    <input type="text" id="nim" name="nim" class="block mt-1 w-full" />
                    <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <button type="submit"
                        class="w-full px-2 py-2 tracking-wide text-white transition-colors duration-200 transform bg-brand-500 rounded-md hover:bg-brand-600 focus:outline-none focus:bg-brand-600">
                        Register
                    </button>
                </div>
            </form>
            <p class="mb-5 text-sm font-medium text-center text-slate-500">
                Already have an account ?
                <a href="{{ route('login') }}" class="font-medium text-brand-500 hover:underline">Log in</a>
            </p>
        </div>
    </div>

    <!-- JAVASCRIPTS -->
    <!-- <div class="menu-overlay"></div> -->
    <script src="assets/libs/lucide/umd/lucide.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="assets/libs/@frostui/tailwindcss/frostui.js"></script>

    <script src="assets/js/app.js"></script>


    {{-- @section('pagescripts') --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role');
            const nipField = document.getElementById('nip-field');
            const nimField = document.getElementById('nim-field');
            const nidnField = document.getElementById('nidn-field');
            const nipInput = document.getElementById('nip');
            const nidnInput = document.getElementById('nidn');
            const nimInput = document.getElementById('nim');

            roleSelect.addEventListener('change', function() {
                const selectedRole = this.value;

                // Reset fields
                nipField.style.display = 'none';
                nidnField.style.display = 'none';
                nimField.style.display = 'none';
                nipInput.required = false;
                nimInput.required = false;
                nidnInput.required = false;

                if (selectedRole === 'dosen') {
                    nipField.style.display = 'block';
                    nidnField.style.display = 'block';
                    nipInput.required = true;
                    nidnInput.required = true;
                } else if (selectedRole === 'mahasiswa' || selectedRole === 'alumni') {
                    nimField.style.display = 'block';
                    nimInput.required = true;
                }
            });
        });
    </script>
    {{-- @endsection --}}

    <!-- JAVASCRIPTS -->
</body>

</html>
