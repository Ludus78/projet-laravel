<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;

class PropertySearch extends Component
{
    public $search = ''; // Variable liée au champ input

    public function render()
    {
        $properties = Property::where('name', 'like', '%' . $this->search . '%')->get();
        return view('livewire.property-search', compact('properties'));
    }

    public function addToFavorites($propertyId)
{
    session()->push('favorites', $propertyId);
    $this->dispatchBrowserEvent('property-added', ['message' => 'Ajouté aux favoris !']);
}

}


