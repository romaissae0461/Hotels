<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Client;
use Illuminate\Http\Request;
use Auth;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();
        //return view('clients.index', compact('clients'));
        return response()->json($clients);

        /*
        $clients = Client::orderBy('nomC','asc');
        if i do orderBy.. i am trying to get an array and in the frontend i should do the:
        if (Array.isArray(resultData.data)) { 
        this.clients = resultData.data;
      } else {
        this.clients = resultData;
      } 
      else i am returning an object no need to check 
        */
    }

    public function create(){
        //return view('clients.create');
        return response()->json();
    }

    public function reservations(Client $client){
        $reservations = $client->reservations()->get();
        return response()->json($reservations);
    }

    public function store(Request $request){
        $this->validate($request,[
            'nomC'=>'required|string',
            'prenom'=>'required|string',
            'adresse'=>'required|string',
            'telephone'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        
        $client = new Client([
            'nomC'=>$request->input('nomC'),
            'prenom'=>$request->input('prenom'),
            'adresse'=> $request->input('adresse'),
            'telephone'=> $request->input('telephone'),
            'email'=> $request->input('email'),
            'password'=> bcrypt($request->input('password'))
        ]);
        $client->save();
        //return back()->with("success","Compte crée avec succés");
        return response()->json($client);
    }

    public function show($id){
        $client = Client::findOrFail($id);
        //return view('clients.view', compact('client'));
        return response()->json($client);
    }

    public function edit(Client $client){
        //$client = Client::findOrFail($id);
        // return view('clients.edit', compact('client'));
        return response()->json($client);
    }

    public function update(Request $request, Client $client){
        //$client = Client::findOrFail($id);
        $request->validate([
            'nomC'=>'required|string',
            'prenom'=>'required|string',
            'adresse'=>'required|string',
            'telephone'=>'required|string',
            'email'=>'required|email',
        ]);
        
        $client->update([
            "nomC"=>$request->nomC,
            "prenom"=>$request->prenom,
            "adresse"=>$request->adresse,
            "telephone"=>$request->telephone,
            "email"=>$request->email,
    ]);
        //return back()->with(['success'=> 'Votre compte a bien été modifié!']);
        return response()->json(['message'=>'Les informations du client ont bien été modifié!']);
    }
/*
  public function delete($id){
        $client = Client::findOrFail($id);
        foreach($client->reservations()->get() as $reservation){
            $room = Chambre::find($reservation->id);
            $room->status=1; //changer l'etat de la chambre => libre/vide
            if($room->update()){
                $client->reservations()->delete();
                $client->delete();
                //return back()->with(['success'=> "Le client $client a été supprimé avec succès!"]);
                return response()->json(['message'=> 'Le client a été supprimé avec succès!']);
            }
        }
        //return back()->with(['fail'=> 'Une erreur est survenue, veuillez réessayer!']);
        return response()->json(['message'=>'Une erreur est survenue, veuillez réessayer!']);
    }
*/
    public function delete(Client $client){
        //$client = Client::findOrFail($id);
        $reservations = $client->reservations()->get();
        if($reservations->isNotEmpty()){
            foreach($reservations as $reservation){
                $room = Chambre::find($reservation->id);
                $room->status=1; //changer l'etat de la chambre => libre/vide
                if($room->update()){
                    $reservations->delete();
                    //return back()->with(['success'=> "Le client $client a été supprimé avec succès!"]);
                }
            }
        }
        $client->delete();
        return response()->json(['message'=> 'Le client a été supprimé avec succès!']);

        //return back()->with(['fail'=> 'Une erreur est survenue, veuillez réessayer!']);
        //return response()->json(['message'=>'Une erreur est survenue, veuillez réessayer!']);
    }

    public function getLogin(){
        //return view('log');
        return response()->json();
    }

    public function login(Request $request){
        $this->validate($request, [
            'email'=>'required|string',
            'password'=>'required|min:8',
        ]);
        if( Auth::attempt(['email' => $request->email,'password'=> $request->password]) ){
            // return redirect()->route('/');
            return response()->json(['success'=>true]);
        }else{
            //return redirect()->route('log')->with(['fail'=>'Email ou password incorrect']);
            return response()->json(['fail'=>'Email ou mot de passe incorrect']);
        }
    }
    public function logOut(){
        Auth::logout();
        //return redirect()->route('log');
        return response()->json(['success'=>true]);
    }

}


