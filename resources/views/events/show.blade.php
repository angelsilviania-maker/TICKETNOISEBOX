<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Konser & Pemesanan Tiket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg grid grid-cols-1 md:grid-cols-2 gap-6 p-6">
                <div>
                    @if($event->image)
                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-72 object-cover rounded-lg shadow">
                    @else
                        <div class="w-full h-72 bg-gray-200 flex items-center justify-center text-gray-500 rounded-lg">
                            <span>Tidak Ada Poster</span>
                        </div>
                    @endif

                    <div class="mt-4">
                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-indigo-600 bg-indigo-200">
                            {{ $event->category }}
                        </span>
                        <h3 class="font-bold text-2xl text-gray-900 mt-2">{{ $event->title }}</h3>
                        <p class="text-lg font-semibold text-gray-700 mt-1">Rp {{ number_format($event->ticket_price, 0, ',', '.') }}</p>
                        <p class="text-gray-600 mt-4 leading-relaxed">{{ $event->description }}</p>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Form Pemesanan Tiket</h3>

                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">

                        <div class="mb-4">
                            <label for="customer_name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('customer_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="customer_email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="customer_email" id="customer_email" value="{{ old('customer_email') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('customer_email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-6">
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah Tiket</label>
                            <input type="number" name="quantity" id="quantity" min="1" value="1" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('quantity') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-indigo-700 transition">
                            Checkout / Pesan Sekarang
                        </button>
                    </form>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('events.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Kembali ke Katalog Konser</a>
            </div>

        </div>
    </div>
</x-app-layout>