<div class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg">
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 rounded">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label for="property" class="block text-sm font-medium text-gray-700">Propriété</label>
            <select wire:model="property_id" id="property" class="w-full mt-1 p-2 border rounded">
                <option value="">Sélectionnez une propriété</option>
                @foreach ($properties as $property)
                    <option value="{{ $property->id }}">{{ $property->name }}</option>
                @endforeach
            </select>
            @error('property_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="check_in" class="block text-sm font-medium text-gray-700">Date d'arrivée</label>
            <input type="date" wire:model="check_in" id="check_in" class="w-full mt-1 p-2 border rounded">
            @error('check_in') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="check_out" class="block text-sm font-medium text-gray-700">Date de départ</label>
            <input type="date" wire:model="check_out" id="check_out" class="w-full mt-1 p-2 border rounded">
            @error('check_out') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="guests" class="block text-sm font-medium text-gray-700">Nombre de personnes</label>
            <input type="number" wire:model="guests" id="guests" class="w-full mt-1 p-2 border rounded">
            @error('guests') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">
            Réserver
        </button>
    </form>
</div>

<div>
    <h2>Test de réservation</h2>
</div>