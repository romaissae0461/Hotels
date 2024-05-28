<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(){
        $rooms = Chambre::all();
        return view('room.index', compact('room'));
    }
    public function create(){
        return view('room.create');
    }

    
    public function store(Request $request){
        $this->validate($request,[
            'numC'=>'required|string',
            'nbrLits'=>'required|integer',
            'type_chambre_id'=>'required',
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
        return redirect()->route('hotel1')->with(['success'=>'Nouvelle chambre ajoutée avec succés!']);

    }

    public function show($id){
        $room = Chambre::findOrFail($id);
        return view('room.show', compact('room'));
    }

    public function edit($id){
        $room = Chambre::findOrFail($id);
        return view('room.edit',compact('room'));
    }
    public function update(Request $request, $id){
        $room = Chambre::findOrFail($id);
        $this->validate($request,[
            'numC'=>'required|string',
            'nbrLits'=>'required|integer',
            'type_chambre_id'=>'required',
            'prixC'=>'required|numeric',
            'etage'=>'required|string',
            'status'=>'required|integer'
        ]);
        $room->numC=$request->numC;
        $room->nbrLits=$request->numLits;
        $room->type_chambre_id=$request->type_chambre_id;
        $room->prixC=$request->prixC;
        $room->etage=$request->etage;
        $room->status=$request->status;

        $room->update();
        return back()->with(['success'=>"La chambre a été modifiée"]);
    }

    public function destroy($id){
        $room = Chambre::findOrFail($id);
        $room->delete() ;
        return  back()->with(['success'=>"La chambre a été supprimé"]);
    }
}
