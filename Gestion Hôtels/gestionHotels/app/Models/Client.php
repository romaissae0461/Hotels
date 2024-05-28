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

    //protected $hidden = ['password','remember_token'];//si y a un prblm elimine remember_token

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
