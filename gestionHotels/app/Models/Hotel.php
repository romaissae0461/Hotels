<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['imageH', 'nomH', 'nbrChambre', 'email', 'adresse', 'type_hotel_id'];


    public function room(){
        return $this->hasMany(Chambre::class);
    }
}
