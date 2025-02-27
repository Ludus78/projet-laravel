<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Choisissez votre bien</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white flex flex-col min-h-screen">
        <!-- Header -->
        <header class="w-full max-w-7xl mx-auto px-6 py-4">
            <nav class="flex items-center justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-2 bg-primary text-white rounded-md hover:bg-blue-700 transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-block px-5 py-2 text-primary border border-primary rounded-md hover:bg-primary hover:text-white transition">
                        Connexion
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="inline-block px-5 py-2 bg-secondary text-white rounded-md hover:bg-purple-700 transition">
                            Inscription
                        </a>
                    @endif
                @endauth
            </nav>
        </header>

        <!-- Main Content -->
        <main class="flex-grow w-full max-w-7xl mx-auto px-6 py-8">
            <h1 class="text-3xl font-semibold mb-6 text-center">Nos biens disponibles</h1>
            
            <!-- Grille de propriétés -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($properties as $property)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition hover:scale-105">
                        <!-- Image du bien (à adapter selon vos données) -->
                        <div class="h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                            @if ($property->image)
                                <img src="{{ asset('storage/' . $property->image) }}" alt="{{ $property->name }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-gray-500 dark:text-gray-400">Image non disponible</span>
                            @endif
                        </div>
                        <!-- Détails du bien -->
                        <div class="p-4">
                            <h2 class="text-xl font-medium mb-2">{{ $property->name }}</h2>
                            <p class="text-gray-600 dark:text-gray-300 mb-4">{{ $property->description }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-primary font-semibold">{{ $property->price }} € / nuit</span>
                                <a href="{{ route('bookings.create', $property->id) }}" class="inline-block px-4 py-2 bg-secondary text-white rounded-md hover:bg-purple-700 transition">
                                    Réserver
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center col-span-full text-gray-500 dark:text-gray-400">Aucun bien disponible pour le moment.</p>
                @endforelse
            </div>
        </main>

        <!-- Footer (optionnel) -->
        <footer class="w-full max-w-7xl mx-auto px-6 py-4 text-center text-gray-500 dark:text-gray-400">
            © {{ date('Y') }} Votre Site de Réservation
        </footer>
    </body>
</html>