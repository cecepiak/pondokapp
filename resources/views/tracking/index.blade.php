@extends('layouts.app')

@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-4">Lacak Pesanan</h1>

        <div class="bg-white rounded-lg shadow-md p-4">
            @foreach ($transactions as $transaction)
                <div class="flex items-start mb-4">
                    <div class="flex flex-col items-center mr-4">
                        <div class="w-4 h-4 rounded-full bg-orange-500"></div>
                        @if (!$loop->last)
                            <div class="w-0.5 h-12 bg-orange-200"></div>
                        @endif
                    </div>

                    <div>
                        <p class="font-semibold">{{ $transaction['status'] }}</p>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ \Carbon\Carbon::parse($transaction['date'])->translatedFormat('l, d F Y') }}
                        </p>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ \Carbon\Carbon::parse($transaction['date'])->translatedFormat('H:i') }} WIB
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection