<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Auth;

class ReservationController extends Controller
{
    public function index(){
        $rooms = Chambre::all();
        return view('reservations.book', compact('rooms'));
    }
//dateReserv	dateArrivee	dateDepart	nbrChambre	nbrPersonne	created_at	updated_at	idC	id	
    public function store(Request $request){
        $this->validate($request,[
            'dateReserv'=>'required|date',
            'dateArrivee'=>'required|date',
            'dateDepart'=>'required|date',
            'nbrChambre'=>'required|integer',
            'nbrPersonne'=>'required|integer'
        ]);
        $room = Chambre::find($request->id);
        $reservation = new Reservation();
        $reservation->dateReserv = $request->dateReserv;
        $reservation->dateArrivee = $request->dateArrivee;
        $reservation->dateDepart = $request->dateDepart;
        $reservation->nbrChambre = $request->nbrChambre;
        $reservation->nbrPersonne = $request->nbrPersonne;
        $reservation->idC = Auth::user()->id;
        $reservation->id = $request->id;
        $reservation->save();
        $room->status=0;
        $room->update();
        return redirect()->route('reservations.index')->with('success','Chambre réservée!');
    }

}
