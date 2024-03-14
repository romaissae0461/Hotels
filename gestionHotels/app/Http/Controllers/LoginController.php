<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showForm(){
        //return view("log");
        return response()->json();
    }
    public function login(Request $request){
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials)){
            $user=Auth::user();
            if($user->role=== 'admin'){
                return redirect()->route('/admin');
            }elseif($user->role==='user'){
                //return redirect()->route('/');
                return response()->json(['success'=>true]);
            }else{
                //return redirect()->route('');
                return response()->json();
            }
        }else{
            //return redirect()->back()->withErrors(['email'=>'Email or password incorrect']);
            return response()->json(['fail'=>'Email ou mot de passe incorrect']);
        }

        
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users,email|max:255',
            'password'=> 'required|string|min:8|confirmed',
            'role' => 'string',
        ]);

        $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role' => $request->role,
        ]);

        Auth::Login( $user );
        if ($user->role === 'admin') {
            return redirect()->route('/admin');
        } elseif ($user->role === 'user') {
            //return redirect()->route('/');
            return response()->json(['success'=>true]);
        } else {
            // return redirect()->route('');
            return response()->json(['fail'=>'Vous ne pouvez pas vous inscrire']);
        }
        // return redirect()->route('login')->with('success','Votre  compte a bien été créé. Vous pouvez maintenant vous connecter');
    }

    public function create(){
        //return view('register');
        return response()->json();
    }
}
