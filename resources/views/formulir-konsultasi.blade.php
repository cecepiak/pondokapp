@extends('layouts.app')

@section('content')

<div class="min-h-screen pt-0 flex items-start justify-center">
<div class="w-full max-w-xl bg-white/50 backdrop-blur-sm rounded-lg shadow-xl p-8 transform transition-transform duration-500 ease-in-out">

<!-- Header Section with Icon and Title -->
<div class="text-center mb-6">
    <div class="bg-green-200 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-4 shadow-lg">
        <span class="material-symbols-outlined text-6xl">support_agent</span>
    </div>
    <h2 class="text-3xl font-bold text-gray-800 text-center mb-2">Layanan Konsultasi</h2>
    <p class="text-center text-gray-600 mb-6">Silakan isi data dengan lengkap, dan klik simpan</p>
</div>

<form method="POST" action="/submit-konsultasi">
    @csrf

    {{-- Input NIK --}}
    <div class="mb-4">
        <label for="nik" class="block text-gray-700 text-sm font-bold mb-2">Masukkan NIK</label>
        <div class="relative flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 text-gray-400 z-10" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
            <input id="nik" type="text" name="nik" placeholder="Masukkan NIK"
                class="bg-white border-none shadow-md appearance-none rounded w-full py-2 pl-10 pr-3 text-gray-700 leading-tight focus:outline-none focus:shadow-lg"
                required oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                maxlength="16" minlength="16">
        </div>
    </div>

    {{-- Input Nama --}}
    <div class="mb-4">
        <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Masukkan Nama</label>
        <div class="relative flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 text-gray-400 z-10" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
            <input id="nama" type="text" name="nama" placeholder="Masukkan Nama Anda"
                       class="bg-white border-none shadow-md appearance-none rounded w-full py-2 pl-10 pr-3 text-gray-700 leading-tight focus:outline-none focus:shadow-lg"
                       required oninput="this.value = this.value.toUpperCase()">
        </div>
    </div>

    {{-- Input Nomor HP / WA --}}
    <div class="mb-4">
        <label for="nomor_hp" class="block text-gray-700 text-sm font-bold mb-2">Masukkan No Whatsapp</label>
        <div class="relative flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 text-gray-400 z-10" viewBox="0 0 20 20" fill="currentColor">
                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 2.19a1 1 0 01-.186 1.05l-1.545 1.545a9 9 0 004.95 4.95l1.545-1.545a1 1 0 011.05-.186l2.19.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.942 18 2 12.058 2 5V3z" />
            </svg>
            <input id="nomor_hp" type="text" name="nomor_hp" placeholder="Masukkan No Whatsapp"
                       class="bg-white border-none shadow-md appearance-none rounded w-full py-2 pl-10 pr-3 text-gray-700 leading-tight focus:outline-none focus:shadow-lg"
                       required oninput="this.value=this.value.replace(/[^0-9]/g,'')">
        </div>
    </div>

    {{-- Dropdown Pilih Jenis Konsultasi --}}
    <div class="mb-4">
        <label for="jenis_konsultasi" class="block text-gray-700 text-sm font-bold mb-2">Pilih Jenis Konsultasi</label>
        <div class="relative flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 text-gray-400 z-10" viewBox="0 0 20 20" fill="currentColor">
                <path d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" />
            </svg>
            <select id="jenis_konsultasi" name="jenis_konsultasi"
                         class="bg-white border-none shadow-md appearance-none rounded w-full py-2 pl-10 pr-3 text-gray-700 leading-tight focus:outline-none focus:shadow-lg"
                         required>
                <option value="">Pilih</option>
                @foreach($jenisPengaduan as $pengaduan)
                    <option value="{{ $pengaduan->id_pengaduan }}">
                        {{ $pengaduan->ket_pengaduan }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Input Isi Informasi --}}
    <div class="mb-6">
        <label for="isi_informasi" class="block text-gray-700 text-sm font-bold mb-2">Masukkan Isi Informasi</label>
        <div class="relative flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-3 top-3 text-gray-400 z-10" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.373 12.14 2 10.512 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7.5 7a.5.5 0 000 1h5a.5.5 0 000-1h-5zM7.5 9a.5.5 0 000 1h5a.5.5 0 000-1h-5z" clip-rule="evenodd" />
            </svg>
            <textarea id="isi_informasi" name="isi_informasi" placeholder="Ketik Informasi Anda disini" rows="6"
                         class="bg-white border-none shadow-md appearance-none rounded w-full py-2 pl-10 pr-3 text-gray-700 leading-tight focus:outline-none focus:shadow-lg"
                         required oninput="this.value = this.value.toUpperCase()"></textarea>
        </div>
    </div>

    <div class="flex items-center justify-between">
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:shadow-lg focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 flex items-center mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
            </svg>
            Kirim
        </button>
        <button type="reset"
            class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded-lg focus:outline-none focus:shadow-lg focus:ring-2 focus:ring-yellow-500 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
            Reset
        </button>
    </div>
</form>

</div>
</div>
@endsection