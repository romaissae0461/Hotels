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

    public function updateStatusBasedOnReservations()
    {
        $now = \Carbon\Carbon::now();
        $latestReservation = $this->reservations()->where('dateDepart', '<', $now)->orderBy('dateDepart', 'desc')->first();
        
        if ($latestReservation && $latestReservation->dateDepart->lt($now)) {
            $this->status = 1; // Available
            $this->save();
        }
    }
}
