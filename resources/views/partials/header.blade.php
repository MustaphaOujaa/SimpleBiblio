<header class="bg-blue-100 border-b border-gray-200 shadow-md">
    <nav class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="index.html" class="text-blue-700 font-bold text-2xl hover:text-blue-900 transition-colors duration-300">Bibliothèque</a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('index') }}" class="text-gray-700 hover:text-blue-600 hover:bg-blue-100 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Accueil</a>
                        <a href="{{ route('bookIndex') }}" class="text-gray-700 hover:text-blue-600 hover:bg-blue-100 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Livres</a>
                        <a href="{{ route('books') }}" class="text-gray-700 hover:text-blue-600 hover:bg-blue-100 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Recherche</a>
                        <a href="{{ route('about') }}" class="text-gray-700 hover:text-blue-600 hover:bg-blue-100 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">A propos</a>
                        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 hover:bg-blue-100 px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200">Contact</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <a href="#" class="text-blue-700 hover:text-white hover:bg-blue-600 font-medium rounded-md text-sm px-3 py-2 transition-colors duration-200">S'inscrire</a>
                    <a href="#" class="ml-3 text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-md text-sm px-3 py-2 transition-colors duration-200">Se connecter</a>
                </div>
            </div>
        </div>
    </nav>
</header>
