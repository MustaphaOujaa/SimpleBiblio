    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h4 class="text-lg font-semibold text-gray-800">{{ __('messages.about_us') }}</h4>
                    <p class="mt-2 text-gray-500">{{ __('messages.footer_desc') }}</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-800">{{ __('messages.important_links') }}</h4>
                    <ul class="mt-2 space-y-2">
                        <li><a href="{{ route('books') }}" class="text-gray-500 hover:text-gray-900">{{ __('messages.search') }}</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-500 hover:text-gray-900">{{ __('messages.about') }}</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-500 hover:text-gray-900">{{ __('messages.contact') }}</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-800">{{ __('messages.contact_info') }}</h4>
                    <ul class="mt-2 space-y-2 text-gray-500">
                        <li>Email: info@example.com</li>
                        <li>Phone: +1 234 567 890</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-gray-800">{{ __('messages.newsletter') }}</h4>
                    <form class="mt-4 flex">
                        <input type="email" placeholder="{{ __('messages.email_placeholder') }}" class="w-full px-3 py-2 rounded-l-md bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="submit" class="px-4 py-2 rounded-r-md bg-blue-600 hover:bg-blue-700 text-white font-semibold">Go</button>
                    </form>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-200 pt-8 text-center">
                <p class="text-gray-500 text-sm">Copyright &copy; 2025. {{ __('messages.copyright') }}</p>
            </div>
        </div>
    </footer>