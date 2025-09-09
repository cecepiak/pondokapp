@extends('layouts.app')
@section('content')

<div class="p-4 pb-20">
    <header class="flex items-center space-x-2">
        </header>
    <section class="mt-4 bg-white rounded-lg shadow-sm overflow-hidden h-32">
        </section>
    <section class="mt-4 bg-white rounded-lg shadow-sm p-4">
        <div class="grid grid-cols-4 gap-2">
            </div>
    </section>

    <style>
    .material-symbols-outlined {
        font-size: 72px;      /* ukuran ikon */
        color: blue;        /* warna hijau */
        font-variation-settings:
        'FILL' 1,           /* isi penuh (1) atau garis (0) */
        'wght' 400,         /* tebal */
        'GRAD' 0,           /* gradien */
        'opsz' 48;          /* ukuran optik */
    }
    </style>

    <section class="mt-4">
    <h2 class="text-lg font-bold mb-2 text-center">Silahkan Pilih</h2>
        <div class="grid grid-cols-2 gap-4">
            {{-- Layanan Konsultasi --}}
            <a href="/formulir-konsultasi" class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col items-center justify-center p-4">
                <span class="material-symbols-outlined">support_agent</span>
                <p class="font-bold text-black-500 mt-1 text-center">Layanan Konsultasi</p>
            </a>
            {{-- Ajukan Layanan Adminduk --}}
            <a href="javascript:void(0);" id="adminduk-link" class="bg-white rounded-lg shadow-sm overflow-hidden flex flex-col items-center justify-center p-4">
                <span class="material-symbols-outlined">article_shortcut</span>
                <p class="font-bold text-black-500 mt-1 text-center">Layanan Adminduk</p>
            </a>
        </div>
    </section>
</div>

<!-- Modal Pop-up untuk peringatan login -->

<div id="login-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
<div class="flex items-center justify-center min-h-screen px-4 py-6 text-center sm:block sm:p-0">
<!-- Overlay -->
<div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

<!-- Kontainer Modal -->

<div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
<div class="sm:flex sm:items-start">
<div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
<!-- Ikon peringatan -->
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-600">
<path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.017 3.377 1.517 3.377h13.064c1.5 0 2.383-1.877 1.517-3.377L12.99 3.375c-.865-1.5-2.29-1.5-3.155 0L2.696 16.501z" />
<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
</div>
<div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
<h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
Akses Ditolak
</h3>
<div class="mt-2">
<p class="text-sm text-gray-500">
Anda belum login. Silahkan login atau daftar terlebih dahulu untuk mengakses layanan ini.
</p>
</div>
</div>
</div>
<div class="mt-5 sm:mt-4 flex flex-col sm:flex-row-reverse gap-y-2 sm:gap-x-3">
<a href="/register" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:w-auto sm:text-sm">
Daftar
</a>
<a href="/login" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto sm:text-sm">
Login
</a>
<button type="button" id="close-modal-btn" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
Tutup
</button>
</div>
</div>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const admindukLink = document.getElementById('adminduk-link');
        const loginModal = document.getElementById('login-modal');
        const closeModalBtn = document.getElementById('close-modal-btn');

        function showModal() {
            loginModal.classList.remove('hidden');
        }

        function hideModal() {
            loginModal.classList.add('hidden');
        }

        @guest
        admindukLink.addEventListener('click', function(e) {
            e.preventDefault();
            showModal();
        });
        @else
        admindukLink.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = '/layanan-adminduk';
        });
        @endguest

        closeModalBtn.addEventListener('click', hideModal);
    });
</script>

@endsection