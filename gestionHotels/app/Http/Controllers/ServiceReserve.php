<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationService;
use Illuminate\Http\Request;

class ServiceReserve extends Controller
{
    public function index(){
        $servReserv = ReservationService::all();
        return response()->json($servReserv);
    }

    public function store(Request $request){
        $this->validate($request, [
            'idReserv'=>'required|exists:reservations,idReserv',
            'idS'=>'required|exists:services,idS',
            'dateSer'=>'required|date',
            'heure'=>'required|date_format:H:i'
        ]);
        $servReserv = Reservation::find($request->idReser);
        $servReserv= new ReservationService([
            'idReserv'=>$request->input('idReserv'),
            'idS'=>$request->input('idS'),
            'dateSer'=>$request->input('dateSer'),
            'heure'=>$request->input('heure')
        ]);
        $servReserv->save();

        $reserv = Reservation::find($request->idReserv);
        $servReserv->services()->attach($request->input('idS'));

        return response()->json(['message'=>'Reservation du service avec succès!']);
    }

}
