<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationService extends Model
{
    use HasFactory;
    protected $fillable=['idReserv', 'idS', 'dateSer', 'heure'];

    public function client(){
        return $this->belongsTo(Client::class,'idC');
    }

    public function services(){
        return  $this->belongsToMany(Service::class, 'reservation_services', 'idReserv', 'idS');
    }

   
}
