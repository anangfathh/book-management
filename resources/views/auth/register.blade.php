<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Choose Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Register As')" />

            <select id="role" class="block mt-1 w-full" name="role" required>
                <option>Not Selected</option>
                @foreach(['mahasiswa', 'dosen', 'alumni'] as $role)
                    <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

         <!-- NIP Field -->
        <div id="nip-field" class="mt-4" style="display: none;">
            <x-input-label for="nip" :value="__('NIP')" />
            <input type="text" id="nip" name="nip" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('nip')" class="mt-2" />
        </div>

        <!-- NIDN Field -->
        <div id="nidn-field" class="mt-4" style="display: none;">
            <x-input-label for="nidn" :value="__('NIDN')" />
            <input type="text" id="nidn" name="nidn" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('nidn')" class="mt-2" />
        </div>

        <!-- NIM Field -->
        <div id="nim-field" class="mt-4" style="display: none;">
            <x-input-label for="nim" :value="__('NIM')" />
            <input type="text" id="nim" name="nim" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

{{-- @section('pagescripts') --}}
<script>
        document.addEventListener('DOMContentLoaded', function () {
        const roleSelect = document.getElementById('role');
        const nipField = document.getElementById('nip-field');
        const nimField = document.getElementById('nim-field');
        const nidnField = document.getElementById('nidn-field');
        const nipInput = document.getElementById('nip');
        const nidnInput = document.getElementById('nidn');
        const nimInput = document.getElementById('nim');

        roleSelect.addEventListener('change', function () {
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