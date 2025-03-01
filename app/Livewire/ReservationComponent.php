<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <!-- Affichage des erreurs de validation -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Affichage du message de succès -->
    @if (session()->has('message'))
        <div class="alert alert-success mb-4">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <!-- Sélection de la propriété -->
        <div>
            <label for="property_id" class="block text-sm font-medium text-gray-700">Propriété</label>
            <select wire:model="property_id" id="property_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                <option value="">Choisir une propriété</option>
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}">{{ $property->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Date d'arrivée -->
        <div>
            <label for="check_in" class="block text-sm font-medium text-gray-700">Date d'arrivée</label>
            <input type="date" wire:model="check_in" id="check_in" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <!-- Date de départ -->
        <div>
            <label for="check_out" class="block text-sm font-medium text-gray-700">Date de départ</label>
            <input type="date" wire:model="check_out" id="check_out" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <!-- Nombre d'invités -->
        <div>
            <label for="guests" class="block text-sm font-medium text-gray-700">Nombre d'invités</label>
            <input type="number" wire:model="guests" id="guests" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" min="1" required>
        </div>

        <!-- Bouton de soumission -->
        <div>
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                Réserver
            </button>
        </div>
    </form>
</div>
