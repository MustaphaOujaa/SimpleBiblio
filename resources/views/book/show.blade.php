@extends('layouts.app')

@section("content")
    <main class="py-10 bg-gray-50 flex-grow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
            <!-- Back Action -->
            <div class="mb-6">
                <a href="{{ route('bookIndex') }}"
                    class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-bold transition">
                    <svg class="w-5 h-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    {{ __('messages.browse_books') }}
                </a>
            </div>

            <div class="flex flex-col lg:flex-row gap-8 items-start">
                <!-- Main Content Area (Right side in RTL) -->
                <div class="flex-grow lg:w-2/3 order-1 rtl:order-1">
                    <div class="premium-card bg-white p-6 sm:p-8 space-y-8">
                        <div class="flex flex-col md:flex-row gap-8 items-start">
                            <!-- Book Image inside main card for better focus -->
                            <div class="w-full md:w-56 flex-shrink-0">
                                <div
                                    class="premium-card p-2 bg-gray-50 border-gray-100 shadow-inner aspect-[3/4] overflow-hidden">
                                    <img class="w-full h-full rounded-lg object-cover shadow-sm transition duration-500 hover:scale-105"
                                        src="{{ !empty($book->cover) && str_starts_with($book->cover, 'http') ? $book->cover : asset('covers/' . (!empty($book->cover) ? $book->cover : 'no_cover.jpg')) }}"
                                        alt="{{ $book->designation }}">
                                </div>
                            </div>

                            <!-- Text Details -->
                            <div class="flex-grow space-y-4">
                                <div>
                                    <span
                                        class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-black rounded-full uppercase tracking-widest mb-3">
                                        {{ $book->type }}
                                    </span>
                                    <h1 class="text-3xl sm:text-4xl font-black text-gray-900 leading-tight">
                                        {{ $book->designation }}
                                    </h1>
                                    <p class="mt-2 text-lg text-gray-500 font-medium">
                                        {{ __('messages.author') }}: <span class="text-blue-600">{{ $book->auteur }}</span>
                                    </p>
                                </div>

                                <div class="pt-6 border-t border-gray-50">
                                    <h3 class="text-xl font-bold text-gray-900 mb-3 flex items-center gap-2">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 6h16M4 12h16M4 18h7"></path>
                                        </svg>
                                        {{ __('messages.description') }}
                                    </h3>
                                    <p class="text-gray-600 leading-relaxed text-base italic line-clamp-6">
                                        {{ $book->description ?: '...' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Metadata Card (Left side in RTL) -->
                <div class="w-full lg:w-1/3 order-2 rtl:order-2 space-y-6">
                    <div class="premium-card bg-white p-6 sm:p-8">
                        <h4 class="text-lg font-black text-gray-900 border-b border-gray-50 pb-4 mb-6">
                            {{ __('messages.book_overview') }}
                        </h4>

                        <dl class="space-y-4">
                            <div class="flex justify-between items-center text-sm">
                                <dt class="text-gray-500 font-bold uppercase tracking-wider text-xs">
                                    {{ __('messages.price') }}</dt>
                                <dd class="text-lg font-black text-blue-600">{{ number_format($book->prix, 2) }} DH</dd>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <dt class="text-gray-500 font-bold uppercase tracking-wider text-xs">
                                    {{ __('messages.category') }}</dt>
                                <dd class="text-gray-900 font-bold">{{ $book->categorie ?: '-' }}</dd>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <dt class="text-gray-500 font-bold uppercase tracking-wider text-xs">
                                    {{ __('messages.publisher') }}</dt>
                                <dd class="text-gray-900 font-bold">{{ $book->editeur ?: '-' }}</dd>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <dt class="text-gray-500 font-bold uppercase tracking-wider text-xs">
                                    {{ __('messages.creation_date') }}</dt>
                                <dd class="text-gray-900 font-bold">{{ $book->annee ?: '-' }}</dd>
                            </div>
                        </dl>

                        <!-- Actions Grid inside the card for structure -->
                        <div class="mt-8 grid grid-cols-1 gap-3">
                            <a href="#"
                                class="btn-hover-fx flex items-center justify-center gap-3 w-full py-4 bg-emerald-600 text-white rounded-xl font-bold text-base shadow-lg shadow-emerald-100">
                                <svg class="w-5 h-5 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                                {{ __('messages.buy') }}
                            </a>
                            @auth
                            <form action="{{ route('book.send_email', $book->id) }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit"
                                    class="btn-hover-fx flex items-center justify-center gap-3 w-full py-4 bg-blue-600 text-white rounded-xl font-bold text-base shadow-lg shadow-blue-100 transition duration-300 hover:bg-blue-700 hover:-translate-y-1">
                                    <svg class="w-5 h-5 font-bold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ __('messages.send') ?? 'Send' }}
                                </button>
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection