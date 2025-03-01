<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Reservation;
use App\Models\Property;
use Carbon\Carbon;

class TempCheck extends Component
{
    public $property_id;
    public $check_in;
    public $check_out;
    public $guests;
    
    public function save()
    {
        $this->validate([
            'property_id' => 'required|exists:properties,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
        ]);

        Reservation::create([
            'property_id' => $this->property_id,
            'user_id' => auth()->id(),
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
            'guests' => $this->guests,
        ]);

        session()->flash('message', 'Réservation effectuée avec succès !');
    }

    public function render()
    {
        return view('livewire.temp-check', [
            'properties' => Property::all(),
        ]);
    }
}
