<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\TypeChambre;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $rooms = Chambre::all();
        //return view('room.index', compact('room'));
        return response()->json($rooms);
    }
    public function create(){
        //return view('room.create');
        return response()->json();
    }

    public function roomType(){
        $typeC = TypeChambre::all();
        return response()->json($typeC);
    }
    public function roomTypeId($id){
        $typeC = TypeChambre::findOrFail($id);
        return response()->json($typeC);
    }

    public function store(Request $request){
        $this->validate($request,[
            'numC'=>'required|string',
            'nbrLits'=>'required|integer',
            'type_chambre_id'=>'required|exists:type_chambre,id',
            'prixC'=>'required|numeric',
            'etage'=>'required|string',
            'status'=>'required|integer'
        ]);
        $room= new Chambre([
            'numC'=>$request->input('numC'),
            'nbrLits'=>$request->input('nbrLits'),
            'type_chambre_id'=>$request->input('type_chambre_id'),
            'prixC'=>$request->input('prixC'),
            'etage'=>$request->input('etage'),
            'status'=>$request->input('status')
        ]);
        $room->save();
        //return redirect()->route('hotel1')->with(['success'=>'Nouvelle chambre ajoutée avec succés!']);
        return response()->json($room);
    }

    public function show($id){
        $room = Chambre::findOrFail($id);
        //return view('room.show', compact('room'));
        return response()->json($room);
    }

    public function edit($id){
        $room = Chambre::findOrFail($id);
        //return view('room.edit',compact('room'));
        return response()->json($room);
    }
    public function update(Request $request, $id){
        $room = Chambre::findOrFail($id);
        $this->validate($request,[
            'numC'=>'required|string',
            'nbrLits'=>'required|integer',
            'type_chambre_id'=>'required|exists:type_chambre,id',
            'prixC'=>'required|numeric',
            'etage'=>'required|string',
            'status'=>'required|integer'
        ]);
        $room->numC=$request->numC;
        $room->nbrLits=$request->nbrLits;
        $room->type_chambre_id=$request->type_chambre_id;
        $room->prixC=$request->prixC;
        $room->etage=$request->etage;
        $room->status=$request->status;

        $room->update();
        //return back()->with(['success'=>"La chambre a été modifiée"]);
        return response()->json(['success'=>true]);
    }

    public function destroy($id){
        $room = Chambre::findOrFail($id);
        $room->delete() ;
        //return  back()->with(['success'=>"La chambre a été supprimé"]);
        return response()->json(['success'=>true]);
    }
}
