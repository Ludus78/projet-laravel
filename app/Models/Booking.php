<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'property_id', 'start_date', 'end_date'];

    // Relation avec l'utilisateur
    public function user()
{
    return $this->belongsTo(User::class);
}


    // Relation avec la propriété
    public function property()
{
    return $this->belongsTo(Property::class);
}

public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('property_id')->constrained()->onDelete('cascade');
        $table->string('name');
        $table->date('date');
        $table->time('time');
        $table->integer('people');
        $table->timestamps();
    });
}

}