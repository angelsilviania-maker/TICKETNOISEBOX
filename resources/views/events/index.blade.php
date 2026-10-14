<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Katalog Konser & Event Musik') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($events as $event)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col justify-between">
                        <div>
                            @if($event->image)
                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                                    <span>Tidak Ada Poster</span>
                                </div>
                            @endif

                            <div class="p-6">
                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-indigo-600 bg-indigo-200">
                                    {{ $event->category }}
                                </span>
                                <h3 class="font-bold text-lg text-gray-900 mt-2">{{ $event->title }}</h3>
                                <p class="text-gray-600 text-sm mt-1">Rp {{ number_format($event->ticket_price, 0, ',', '.') }}</p>
                                <p class="text-gray-500 text-sm mt-3 line-clamp-2">{{ $event->description }}</p>
                            </div>
                        </div>

                        <div class="p-6 pt-0">
                            <a href="{{ route('events.show', $event->id) }}" class="inline-block w-full text-center bg-gray-800 text-white font-semibold py-2 px-4 rounded hover:bg-gray-700 transition">
                                Detail & Pesan Tiket
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-center text-gray-500">
                        Belum ada event atau konser yang tersedia saat ini.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>