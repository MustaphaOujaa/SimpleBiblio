@extends('layouts.app')
@section('content')
    <div class="bg-gray-50 py-8">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">{{ __('messages.add_book') }}</h1>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <ul class="list-disc list-inside text-red-600 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="designation" class="block text-sm font-medium text-gray-700 mb-1">
                            {{ __('messages.book_title') }} *
                        </label>
                        <input type="text" id="designation" name="designation" value="{{ old('designation') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="auteur" class="block text-sm font-medium text-gray-700 mb-1">
                            {{ __('messages.author') }} *
                        </label>
                        <input type="text" id="auteur" name="auteur" value="{{ old('auteur') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="editeur" class="block text-sm font-medium text-gray-700 mb-1">
                            {{ __('messages.publisher') }}
                        </label>
                        <input type="text" id="editeur" name="editeur" value="{{ old('editeur') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="prix" class="block text-sm font-medium text-gray-700 mb-1">
                            {{ __('messages.price') }} (DH) *
                        </label>
                        <input type="number" id="prix" name="prix" value="{{ old('prix') }}" step="0.01" min="0" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-1">
                            {{ __('messages.book_type') }} *
                        </label>
                        <input type="text" id="type" name="type" value="{{ old('type') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                            {{ __('messages.description') }}
                        </label>
                        <textarea id="description" name="description" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label for="cover" class="block text-sm font-medium text-gray-700 mb-1">
                            {{ __('messages.cover_image') }}
                        </label>
                        <input type="file" id="cover" name="cover" accept="image/*"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="flex flex-wrap justify-end gap-3 pt-4">
                        <a href="{{ route('bookIndex') }}"
                            class="btn-text-fit min-w-24 px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                            {{ __('messages.cancel') }}
                        </a>
                        <button type="submit"
                            class="btn-text-fit btn-polished min-w-28 px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            {{ __('messages.add_book') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
