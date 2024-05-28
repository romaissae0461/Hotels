<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturation extends Model
{
    use HasFactory;
    protected $fillable=['idC', 'idReserv', 'idS', 'prixC', 'tax', 'totalPrix'];

    public function client(){
        return  $this->belongsTo(Client::class, 'idC');
    }
}
