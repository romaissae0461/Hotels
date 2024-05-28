<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['idReserv', 'nom', 'prenom', 'email', 'dateReserv', 'dateArrivee', 'dateDepart', 'nbrChambre', 'nbrPersonne', 'idC', 'id'];
    
    public function client(){
        return $this->belongsTo(Client::class, 'idC');
    }
    //pour l'erreur de liaison entre client et reservation, j'ai fait premierement  return $this->belongsTo(Client::class, 'idC'); parceque laravel va cherché client_id et pas idC, je dois spécifiée un custom foreign key pour la relation, mais il n'a pas aidé(j'aurais besoin de 'idC' pour les resrvations), puis j'ai fais la meme chose dans client pour qu'il recognise la reservation et ca a réussie. 

    public function room(){
        return $this->belongsTo(Chambre::class, 'id');
    }
}
