<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    protected $fillable = ['numC', 'nbrLits', 'type_chambre_id', 'prixC', 'etage', 'status'];

    public function reservations(){
        return $this->belongsTo(Reservation::class);
    }
}
