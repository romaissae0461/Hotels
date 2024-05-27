<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\TypeHotel;
use Illuminate\Http\Request;

class Admin extends Controller
{
    public function addHotel(){
        $typehotels= TypeHotel::all();
        return view('Admins.addHotel',compact('typehotels'));
    }

    public function manageHotels(){
        $hotels= Hotel::all();
        return view('Admins.admin',compact('hotels'));
    }

    public function storeHotel(Request $request){
    // Valider les données
    $request->validate([
        'nomH' => 'required|string',
        'nbrChambre' => 'required|integer',
        'email' => 'required|string',
        'adresse' => 'required|string',
        'type_hotel_id' => 'required|exists:type_hotel,id',
    ]);

    // Créer un nouvel hôtel
    $hotel = new Hotel([
        'nomH' => $request->input('nomH'),
        'nbrChambre' => $request->input('nbrChambre'),
        'email' => $request->input('email'),
        'adresse' => $request->input('adresse'),
        'type_hotel_id' => $request->input('type_hotel_id'),
    ]);

    // Enregistrer l'hôtel dans la base de données
    $hotel->save();

    // Redirection avec un message de confirmation
    return redirect()->route('admin.manageHotels')->with('success', 'Hôtel ajouté avec succès!');
}


    public function offre(){
        $offres = Hotel::select('imageH', 'nomH', 'nbrChambre', 'email', 'adresse', 'type_hotel_id')->get();
        return view ('Admins.offre', compact('offres'));
    }

    public function offres(){
        $offres = Hotel::select('imageH', 'nomH', 'nbrChambre', 'email', 'adresse', 'type_hotel_id')->get();
        return view('welcome', compact('offres'));
    }
    
}
