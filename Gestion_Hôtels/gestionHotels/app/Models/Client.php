<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable;


    protected $primaryKey = 'idC';
    protected $fillable = ['nomC', 'prenom', 'adresse', 'telephone', 'email', 'password'] ;



    public function reservations(){
        return $this->hasMany(Reservation::class, 'id'); //'id' is the custom foreign key for the relationship between clients and reservations.
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }
}
