<header class="bg-white border-b border-gray-100 shadow-sm sticky top-0 z-50">
    <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Left: Logo & Nav -->
            <div class="flex items-center gap-8">
                <div class="flex-shrink-0">
                    <a href="{{ route('index') }}" class="text-blue-600 font-black text-2xl tracking-tight">{{ __('messages.library') }}</a>
                </div>
                <div class="hidden lg:block">
                    <div class="flex items-center gap-1">
                        <a href="{{ route('index') }}" class="text-gray-600 hover:text-blue-600 px-4 py-2 rounded-xl text-sm font-semibold transition">{{ __('messages.home') }}</a>
                        <a href="{{ route('bookIndex') }}" class="text-gray-600 hover:text-blue-600 px-4 py-2 rounded-xl text-sm font-semibold transition">{{ __('messages.books') }}</a>
                        <a href="{{ route('books') }}" class="text-gray-600 hover:text-blue-600 px-4 py-2 rounded-xl text-sm font-semibold transition">{{ __('messages.search') }}</a>
                        <a href="{{ route('about') }}" class="text-gray-600 hover:text-blue-600 px-4 py-2 rounded-xl text-sm font-semibold transition">{{ __('messages.about') }}</a>
                        <a href="{{ route('contact') }}" class="text-gray-600 hover:text-blue-600 px-4 py-2 rounded-xl text-sm font-semibold transition">{{ __('messages.contact') }}</a>
                    </div>
                </div>
            </div>

            <!-- Right: Lang & Auth -->
            <div class="flex items-center gap-4">
                <!-- Language Switcher -->
                <div class="flex items-center bg-gray-50 rounded-xl px-2 py-1 border border-gray-100">
                    <a href="{{ route('lang.switch', 'ar') }}" class="px-3 py-1.5 rounded-lg text-xs font-bold transition {{ app()->getLocale() == 'ar' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-400 hover:text-gray-600' }}">AR</a>
                    <a href="{{ route('lang.switch', 'fr') }}" class="px-3 py-1.5 rounded-lg text-xs font-bold transition {{ app()->getLocale() == 'fr' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-400 hover:text-gray-600' }}">FR</a>
                    <a href="{{ route('lang.switch', 'en') }}" class="px-3 py-1.5 rounded-lg text-xs font-bold transition {{ app()->getLocale() == 'en' ? 'bg-white text-blue-600 shadow-sm' : 'text-gray-400 hover:text-gray-600' }}">EN</a>
                </div>

                <div class="h-8 w-px bg-gray-100 mx-2"></div>

                <div class="flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 font-bold text-sm transition">{{ __('messages.dashboard') }}</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-600 hover:text-white font-bold text-sm px-4 py-2 rounded-xl transition">{{ __('messages.logout') }}</button>
                        </form>
                    @else
                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600 font-bold text-sm transition">{{ __('messages.register') }}</a>
                        <a href="{{ route('login') }}" class="bg-blue-600 text-white hover:bg-blue-700 font-bold text-sm px-6 py-2.5 rounded-xl shadow-lg shadow-blue-100 transition btn-premium">{{ __('messages.login') }}</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>
