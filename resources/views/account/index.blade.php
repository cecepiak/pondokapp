@extends('layouts.app')

@section('content')

<div class="p-4">
    <h1 class="text-2xl font-bold mb-4">Akun Saya</h1>

    <div class="bg-white rounded-lg shadow-md p-4 mb-4">
        <div class="flex items-center mb-4">
            {{-- Cek apakah ada foto di database --}}
            @if ($user->photos)
            <img src="{{ asset('storage/photos/' . $user->photos) }}" alt="Foto Profil" class="rounded-full w-16 h-16 mr-4 object-cover">
            @else
            {{-- Avatar default jika tidak ada foto --}}
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->first_name) }}&size=64&background=random" alt="Avatar Default" class="rounded-full w-16 h-16 mr-4">
            @endif
            <div>
                <p class="font-semibold text-lg">{{ $user->first_name }}</p>
                <p class="text-gray-700 text-sm italic">NIK : {{ $user->nik }}</p>
                <p class="text-gray-700 text-sm italic">KK : {{ decrypt_legacy_field($user->no_kk) }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-2">
        {{-- Dokumen Saya --}}
        <a href="#" class="flex items-center py-3 px-2 border-b border-gray-200 hover:bg-gray-50">
            <span class="mr-4 text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
            </span>
            <span class="font-semibold">Dokumen Saya</span>
        </a>

        {{-- Pengaturan Akun --}}
        <a href="javascript:void(0);" id="settings-link" class="flex items-center py-3 px-2 border-b border-gray-200 hover:bg-gray-50">
            <span class="mr-4 text-black-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </span>
            <span class="font-semibold">Pengaturan Akun</span>
        </a>

        {{-- Formulir Pengaturan Akun (tersembunyi secara default) --}}

        <div id="settings-form" class="hidden p-4 bg-gray-50 mt-2 rounded-md">
            <h3 class="font-semibold text-md mb-4">Ubah Data Akun</h3>
            <form action="#" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">e-Mail</label>
                    <input type="text" name="email" id="email" value="{{ $user->email }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Whatsapp</label>
                    <input type="number" name="phone" id="phone" value="{{ $user->phone }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>

                <div class="mb-4">
                    <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                    <select name="kec_id" id="kecamatan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Pilih Kecamatan</option>
                        @foreach ($kecamatan as $kec)
                        <option value="{{ $kec->no_kec }}" @if ($user->kec_id == $kec->no_kec) selected @endif>
                            {{ $kec->nama_kec }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="kelurahan" class="block text-sm font-medium text-gray-700">Kelurahan</label>
                    <select name="kel_id" id="kelurahan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        {{-- Opsi ini akan diisi secara dinamis oleh JavaScript --}}
                        @foreach ($kelurahan as $kel)
                        <option value="{{ $kel->no_kel }}" @if ($user->kel_id == $kel->no_kel) selected @endif class="kelurahan-option" data-no-kec="{{ $kel->no_kec }}">
                            {{ $kel->nama_kel }}
                        </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol Simpan --}}

                <div class="flex justify-end">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

        {{-- Keluar --}}
        <a href="/logout" class="flex items-center py-3 px-2 border-b border-gray-200 hover:bg-gray-50">
            <span class="mr-4 text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                </svg>
            </span>
            <span class="font-semibold">Keluar</span>
        </a>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const settingsLink = document.getElementById('settings-link');
        const settingsForm = document.getElementById('settings-form');

        settingsLink.addEventListener('click', function(e) {
            e.preventDefault();
            settingsForm.classList.toggle('hidden');
        });

        const kecamatanDropdown = document.getElementById('kecamatan');
        const kelurahanDropdown = document.getElementById('kelurahan');

        // Menyimpan semua kelurahan dalam variabel JavaScript
        const allKelurahan = @json($kelurahan);
        //const userKelId = {
        //    {
        //        $user - > kel_id ? ? 'null'
        //    }
        //};
        //const userKecId = {
        //    {
        //        $user - > kec_id ? ? 'null'
        //    }
        //};

        function updateKelurahanDropdown() {
            const selectedKecamatanId = kecamatanDropdown.value;

            // Hapus semua opsi kelurahan yang ada
            kelurahanDropdown.innerHTML = '';

            // Tambahkan opsi default
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Pilih Kelurahan';
            kelurahanDropdown.appendChild(defaultOption);

            // Filter kelurahan berdasarkan kecamatan yang dipilih
            const filteredKelurahan = allKelurahan.filter(kel => kel.no_kec == selectedKecamatanId);

            // Tambahkan opsi yang sudah difilter
            filteredKelurahan.forEach(kel => {
                const option = document.createElement('option');
                option.value = kel.no_kel;
                option.textContent = kel.nama_kel;

                // Jika kelurahan cocok dengan kelurahan pengguna, pilih secara otomatis
                if (kel.no_kel == userKelId && selectedKecamatanId == userKecId) {
                    option.selected = true;
                }

                kelurahanDropdown.appendChild(option);
            });
        }

        // Panggil fungsi saat halaman dimuat
        updateKelurahanDropdown();

        // Panggil fungsi saat pilihan kecamatan berubah
        kecamatanDropdown.addEventListener('change', updateKelurahanDropdown);
    });

</script>

@endsection
