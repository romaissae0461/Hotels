<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Auth;

class ReservationController extends Controller
{
    public function index(){
        $reservation = Reservation::all();
        //return view('reservations.book', compact('rooms'));
        return response()->json($reservation);
    }
//dateReserv	dateArrivee	dateDepart	nbrChambre	nbrPersonne	created_at	updated_at	idC	id	
    public function store(Request $request){
        $this->validate($request,[
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'email'=>'required|string',
            'dateReserv'=>'required|date',
            'dateArrivee'=>'required|date',
            'dateDepart'=>'required|date',
            'nbrChambre'=>'required|integer',
            'nbrPersonne'=>'required|integer'
        ]);
        $room = Chambre::find($request->id);
        if($room->status == 0){
            return response()->json(['error'=>'Chambre réservée!'], 400);
        }

        $existingReservation = DB::table('reservations')
        ->where('id', $request->id)
        ->where(function ($query) use ($request){
            $query->whereBetween('dateArrivee', [$request->dateReserv, $request->dateDepart])
            ->orWhereBetween('dateDepart', [$request->dateReserv, $request->dateDepart])
            ->orWhere(function ($query) use ($request) {
                $query->where('dateArrivee', '<=', $request->dateReserv)
                ->where('dateDepart', '>=', $request->dateDepart);
            });
        })
        ->first();

        if($existingReservation){
            return response()->json(['error'=>'Chambre réservée pour la date spécifié'], 400);
        }

        $reservation = new Reservation();
        $reservation->nom = $request->nom;
        $reservation->prenom = $request->prenom;
        $reservation->email = $request->email;
        $reservation->dateReserv = $request->dateReserv;
        $reservation->dateArrivee = $request->dateArrivee;
        $reservation->dateDepart = $request->dateDepart;
        $reservation->nbrChambre = $request->nbrChambre;
        $reservation->nbrPersonne = $request->nbrPersonne;
        //$reservation->idC = Auth::user()->id;
        $reservation->idC = $request->idC;
        $reservation->id = $request->id;
        $reservation->save();
        $room->status=0;
        $room->update();
        //return redirect()->route('reservations.index')->with('success','Chambre réservée!');
        return response()->json(['success'=>true]);
    }

    public function checkAvailability(Request $request)
    {
        $this->validate($request, [
            'dateArrivee'=>'required|date',
            'dateDepart'=>'required|date',
            'nbrChambre'=>'required|integer',
            'nbrPersonne'=>'required|integer'
        ]);

        $dateArrivee = $request->input('dateArrivee');
        $dateDepart = $request->input('dateDepart');
        $nbrChambre = $request->input('nbrChambre');
        $nbrPersonne = $request->input('nbrPersonne');

        $existingReservation = DB::table('reservations')
            ->where(function ($query) use ($dateArrivee, $dateDepart) {
                $query->whereBetween('dateArrivee', [$dateArrivee, $dateDepart])
                    ->orWhereBetween('dateDepart', [$dateArrivee, $dateDepart])
                    ->orWhere(function ($query) use ($dateArrivee, $dateDepart) {
                        $query->where('dateArrivee', '<=', $dateArrivee)
                            ->where('dateDepart', '>=', $dateDepart);
                    });
            })
            ->count();

        $availableRooms = Chambre::where('status', 1)->count();

        if ($existingReservation >= $availableRooms) {
            return response()->json(['error' => 'No rooms available for the specified dates'], 400);
        }

        return response()->json(['success' => true]);
    }
}
