<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $primaryKey = 'idS'; //K maj
    protected $fillable = ['idS', 'nomS', 'descriptionS', 'prixS'];
    public function serviceReserv(){
       return $this->belongsToMany(ReservationService::class, 'idS', 'id', 'idReserv');
    }

    public function client(){
        return $this->belongsTo(Client::class, 'idC');
    }
}
