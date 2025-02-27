<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Réserver {{ $property->name }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white flex flex-col min-h-screen">
        <!-- Header -->
        <header class="w-full max-w-7xl mx-auto px-6 py-4">
            <nav class="flex items-center justify-between gap-4">
                <a href="{{ route('welcome') }}" class="text-primary font-semibold hover:underline">Retour aux biens</a>
                <div class="flex items-center gap-4">
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
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="flex-grow w-full max-w-7xl mx-auto px-6 py-8">
            <h1 class="text-3xl font-semibold mb-6 text-center">Réserver {{ $property->name }}</h1>

            <!-- Messages de succès ou d'erreur -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Formulaire de réservation -->
            <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                <form action="{{ route('bookings.store') }}" method="POST" class="flex flex-col gap-4">
                    @csrf
                    <input type="hidden" name="property_id" value="{{ $property->id }}">

                    <!-- Nom -->
                    <div>
                        <label for="name" class="block mb-1 font-medium">Votre nom</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        @error('name')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Date -->
                    <div>
                        <label for="date" class="block mb-1 font-medium">Date de réservation</label>
                        <input type="date" id="date" name="date" value="{{ old('date') }}" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        @error('date')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Heure -->
                    <div>
                        <label for="time" class="block mb-1 font-medium">Heure</label>
                        <input type="time" id="time" name="time" value="{{ old('time') }}" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        @error('time')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nombre de personnes -->
                    <div>
                        <label for="people" class="block mb-1 font-medium">Nombre de personnes</label>
                        <input type="number" id="people" name="people" min="1" value="{{ old('people') }}" class="w-full p-2 border rounded-md dark:bg-gray-700 dark:border-gray-600 focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        @error('people')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Bouton de soumission -->
                    <button type="submit" class="mt-4 px-6 py-2 bg-secondary text-white rounded-md hover:bg-purple-700 transition">
                        Confirmer la réservation
                    </button>
                </form>
            </div>
        </main>

        <!-- Footer -->
        <footer class="w-full max-w-7xl mx-auto px-6 py-4 text-center text-gray-500 dark:text-gray-400">
            © {{ date('Y') }} Votre Site de Réservation
        </footer>
    </body>
</html>