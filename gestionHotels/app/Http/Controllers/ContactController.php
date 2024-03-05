<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create(){
        return view('contacts.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name'=>'required|string',
            'email'=> 'required|email',
            'message'=>'required|string|max:5000'
        ]);

        $contact = new Contact([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        $contact->save();
        return redirect()->route('contacts.create')->with(['success' => 'Message envoyé avec succès']);
    }

    public function destroy($id){
        $contact = Contact::finOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with(['success'=>'Message supprimé avec succès']);
    }
}
