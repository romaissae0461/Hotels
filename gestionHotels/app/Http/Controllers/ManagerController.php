<?php

namespace App\Http\Controllers;

use App\Models\Chambre;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Manager;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Auth;

class ManagerController extends Controller
{
    public function index(){
        $managers = Manager::all(); 
        //return view('managers.index', compact('managers'));
        return response()->json($managers);
    }

    public function manageClients(){
        $client = Client::all();
        return response()->json($client);
    }

    public function manageContacts(){
        $contact = Contact::all();
        return response()->json($contact);
    }

    public function manageRooms(){
        $room = Chambre::all();
        return response()->json($room);
    }

    public function manageReservations(){
        $reservation = Reservation::all();
        return response()->json($reservation);
    }

    public function create(){
        return view('managers.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nomM'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|min:8'
        ]);

        $manager = new Manager([
            'nomM'=>$request->input('nomM'),
            'email'=>$request->input('email'),
            'password'=>bcrypt($request->input('password')),
        ]);
        $manager->save();
        return redirect()->route('managers.index')->with(['success'=> 'Manager ajouté avec succès!']);
    }

    public function destroy($id){
        $manager = Manager::findOrFail($id);
        $manager->delete();
        return redirect()->route('managers.index')->with(['success'=> 'Manager supprimé avec succès!']);
    }

    public function getLogin(){
        return view('log');
    }

    public function login(Request $request){
        $this->validate($request,[
            'email'=> 'required|string',
            'password'=>'required|min:8'
        ]);
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('managers.index');
        }
        else{
            return redirect()->route('log')->with(['success'=>'Email ou mot de passe incorrect']);
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('log');
    }

}
