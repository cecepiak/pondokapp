@extends('layouts.app')

@section('content')

<div class="min-h-screen pt-0 flex items-start justify-center">
    <div class="w-full max-w-xl bg-white/50 backdrop-blur-sm rounded-lg shadow-xl p-8 transform transition-transform duration-500 ease-in-out">
        <div class="text-center mb-6">
            <div class="bg-blue-200 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-4 shadow-lg">
                <span class="material-symbols-outlined text-6xl">shield_locked</span>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-2">Daftar Akun</h2>
            <p class="text-center text-gray-600 mb-6">Silakan isi data dengan lengkap, dan klik simpan</p>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            {{-- Input NIK --}}
            <div>
                <label for="nik" class="block text-gray-700 text-sm font-bold mb-2">Masukkan NIK</label>
                <input id="nik" type="text" name="nik" placeholder="Masukkan NIK" value="{{ old('nik') }}" required autofocus oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,16)" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50
                @error('nik') border-red-500 @enderror">
                @error('nik')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input No KK --}}
            <div>
                <label for="no_kk" class="block text-gray-700 text-sm font-bold mb-2">Masukkan Nomor KK</label>
                <input id="no_kk" type="text" name="no_kk" placeholder="Masukkan Nomor KK" value="{{ old('no_kk') }}" required oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,16)" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50
                @error('no_kk') border-red-500 @enderror">
                @error('no_kk')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Nama Lengkap --}}
            <div>
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
                <input id="name" type="text" name="name" placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}" required autocomplete="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50
                @error('name') border-red-500 @enderror" oninput="this.value = this.value.toUpperCase()">
                @error('name')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Dropdown Pilih Kecamatan --}}
            <div>
                <label for="kecamatan" class="block text-gray-700 text-sm font-bold mb-2">Pilih Kecamatan</label>
                <select id="kecamatan" name="kecamatan" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('kecamatan') border-red-500 @enderror">
                    <option value="">Pilih Kecamatan</option>
                    @foreach ($kecamatans as $kec)
                    <option value="{{ $kec->id }}" {{ old('kecamatan') == $kec->id ? 'selected' : '' }}>
                        {{ $kec->nama }}
                    </option>
                    @endforeach
                </select>
                @error('kecamatan')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Dropdown Pilih Desa/Kelurahan --}}
            <div>
                <label for="desa_kelurahan" class="block text-gray-700 text-sm font-bold mb-2">Pilih Desa/Kelurahan</label>
                <select id="desa_kelurahan" name="desa_kelurahan" required disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('desa_kelurahan') border-red-500 @enderror">
                    <option value="">Pilih Desa/Kelurahan</option>
                </select>
                @error('desa_kelurahan')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Email --}}
            <div>
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Alamat Email</label>
                <input id="email" type="email" name="email" placeholder="Masukkan e-Mail" value="{{ old('email') }}" required autocomplete="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('email') border-red-500 @enderror">
                @error('email')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input No HP --}}
            <div>
                <label for="no_hp" class="block text-gray-700 text-sm font-bold mb-2">Nomor WhatsApp</label>
                <input id="no_hp" type="text" name="no_hp" placeholder="Masukkan Nomor WhatsApp" value="{{ old('no_hp') }}" required oninput="this.value=this.value.replace(/[^0-9]/g,'')" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('no_hp') border-red-500 @enderror">
                @error('no_hp')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Input Password --}}
            <div>
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <div class="relative">
                    <input id="password" type="password" name="password" placeholder="Masukkan Password" required autocomplete="new-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 @error('password') border-red-500 @enderror">
                    <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                        <svg id="eye-open" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="eye-closed" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.875A10.026 10.026 0 0112 19c-4.478 0-8.268-2.943-9.542-7 1.274-4.057 5.064-7 9.542-7 1.549 0 3.033.284 4.409.851M12 13a3 3 0 100-6 3 3 0 000 6z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-1.5-1.5M10.5 10.5l-2-2z" />
                        </svg>
                    </button>
                </div>
                @error('password')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol Simpan --}}
            <div class="pt-4">
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    Simpan
                </button>
            </div>

            <div class="text-center mt-4 text-sm text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Login di sini</a>
            </div>

        </form>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const kecamatanDropdown = document.getElementById('kecamatan');
        const desaDropdown = document.getElementById('desa_kelurahan');

        // Event listener saat pilihan kecamatan berubah
        kecamatanDropdown.addEventListener('change', function() {
            const kecamatanId = this.value;

            // Bersihkan dropdown desa
            desaDropdown.innerHTML = '<option value="">PILIH DESA/KELURAHAN</option>';
            desaDropdown.disabled = true; // Nonaktifkan dropdown desa saat memuat

            if (kecamatanId) {
                fetch(`/desa?id_kecamatan=${kecamatanId}`) // Panggil rute API yang baru dibuat
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(desa => {
                            const option = document.createElement('option');
                            option.value = desa.id; // Pastikan ID di tabel setup_kel
                            option.textContent = desa.nama;
                            desaDropdown.innerHTML = ''; // Clear existing options
                            desaDropdown.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>'; // Add default option
                            data.forEach(desa => {
                                const option = document.createElement('option');
                                option.value = desa.id;
                                option.textContent = desa.nama;
                                desaDropdown.appendChild(option);
                            });
                        });
                        desaDropdown.disabled = false; // Aktifkan dropdown setelah terisi
                    })
                    .catch(error => {
                        console.error('Error fetching desa data:', error);
                        desaDropdown.disabled = false;
                    });
            } else {
                desaDropdown.disabled = false;
            }
        });
    });

    // Skrip untuk show/hide password
    const passwordInput = document.querySelector('#password');
    const togglePasswordIcon = document.querySelector('#togglePassword i');
    const showPasswordCheckbox = document.querySelector('#show_password_checkbox');

    function togglePasswordVisibility() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        togglePasswordIcon.classList.toggle('fa-eye');
        togglePasswordIcon.classList.toggle('fa-eye-slash');
    }

    togglePasswordIcon.parentElement.addEventListener('click', togglePasswordVisibility);
    showPasswordCheckbox.addEventListener('change', togglePasswordVisibility);

</script>

@endsection
