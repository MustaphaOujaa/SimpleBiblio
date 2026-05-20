@extends('layouts.app')

@section('content')
    <main class="py-12 bg-gray-50 min-h-screen">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Search Header -->
            <div class="text-center mb-10">
                <h1 class="text-4xl font-extrabold text-gray-900">{{ __('messages.search_title') }}</h1>
                <p class="mt-3 text-lg text-gray-500">{{ __('messages.welcome') }}</p>
            </div>

            <!-- Search Form -->
            <div class="max-w-3xl mx-auto mb-12">
                <form method="GET" action="{{ route('books') }}"
                    class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <!-- Search Input -->
                        <div class="flex-1">
                            <div class="relative">
                                <!-- Input Field -->
                                <input type="text" name="q" value="{{ $query ?? '' }}"
                                    placeholder="{{ __('messages.search_placeholder') }}"
                                    class="w-full py-3 px-4 rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                            </div>
                        </div>

                        <!-- Type Filter -->
                        <div class="sm:w-48">
                            <select name="type"
                                class="w-full py-3 px-4 rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                <option value="">{{ __('messages.all_types') }}</option>
                                @if(isset($types))
                                    @foreach($types as $t)
                                        <option value="{{ $t }}" {{ (isset($type) && $type == $t) ? 'selected' : '' }}>{{ $t }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <!-- Search Button -->
                        <div>
                            <button type="submit"
                                class="w-full sm:w-auto px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-300 shadow-md hover:shadow-lg">
                                {{ __('messages.search') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Results Section -->
            @if(isset($query) && $query)
                <div class="mb-8 flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-gray-800">
                        {{ __('messages.search_results_for') }} "<span class="text-blue-600">{{ $query }}</span>"
                    </h2>
                    <span class="text-gray-500 bg-white px-4 py-2 rounded-full border border-gray-200 shadow-sm">
                        {{ $books->total() }}
                        {{ $books->total() <= 1 ? __('messages.book_found') : __('messages.books_found') }}
                    </span>
                </div>
            @else
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">{{ __('messages.search_results') }}</h2>
                </div>
            @endif

            @if($books->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($books as $book)
                        <div
                            class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-200 overflow-hidden">
                            <!-- Book Cover -->
                            <!-- Book Cover -->
                            <div class="aspect-[3/4] overflow-hidden bg-gray-50 flex items-center justify-center">
                            <img src="{{ str_starts_with($book->cover, 'http') ? $book->cover : asset('covers/' . $book->cover) }}"
                                alt="{{ $book->designation }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>

                            <!-- Card Content -->
                            <div class="p-5 space-y-3">
                                <h3 class="font-bold text-lg text-gray-900 line-clamp-2 leading-tight">
                                    {{ $book->designation }}
                                </h3>
                                <p class="text-sm text-gray-500">{{ $book->auteur }}</p>

                                <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                    <span class="text-blue-600 font-bold text-lg">{{ $book->prix }} DH</span>
                                    <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">{{ $book->type }}</span>
                                </div>

                                <!-- Action -->
                                <a href="{{ route('book.show', $book->id) }}"
                                    class="block w-full text-center py-2.5 bg-blue-50 text-blue-600 font-medium rounded-lg hover:bg-blue-100 transition duration-200">
                                    {{ __('messages.view') }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    <div class="w-full">
                        {{ $books->links() }}
                    </div>
                </div>
            @else
                <!-- No Results -->
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-6">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-700">{{ __('messages.no_results') }}</h3>
                    <p class="mt-2 text-gray-500">{{ __('messages.no_results_desc') }}</p>
                </div>
            @endif

        </div>
    </main>
@endsection