<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BookingController extends Controller
{
    public function create($propertyId)
    {
        $property = Property::findOrFail($propertyId);
        return view('bookings.create', compact('property'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'name' => 'required|string|max:255',
            'date' => 'required|date|after:today',
            'time' => 'required',
            'people' => 'required|integer|min:1',
        ]);

        Booking::create($request->all());

        return redirect()->route('welcome')->with('success', 'Réservation effectuée avec succès !');
    }
}