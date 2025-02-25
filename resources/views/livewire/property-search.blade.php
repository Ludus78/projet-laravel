<div>
    <input 
        type="text" 
        wire:model="search" 
        class="border p-2 w-full" 
        placeholder="Rechercher une propriété..."
    >

    <ul class="mt-4">
        @foreach ($properties as $property)
            <li class="p-2 border-b">{{ $property->name }}</li>
        @endforeach
    </ul>
</div>

<ul class="mt-4">
    @foreach ($properties as $property)
        <li class="p-2 border-b flex justify-between">
            {{ $property->name }}
            <button 
                wire:click="addToFavorites({{ $property->id }})"
                class="bg-primary text-white px-3 py-1 rounded"
            >
                ❤️ Favori
            </button>
        </li>
    @endforeach
</ul>

<script>
    window.addEventListener('property-added', event => {
        alert(event.
        detail.message);
    });
</script>
