<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    //protected $primaryKey = 'id';
    protected $fillable = ['image','numC', 'nbrLits', 'type_chambre_id', 'prixC', 'etage', 'status', 'infos'];

    public function reservations(){
        return $this->hasMany(Reservation::class, 'idReserv');
    }
}
