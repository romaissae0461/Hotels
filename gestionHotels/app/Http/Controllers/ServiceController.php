<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $service = Service::all();
        return response()->json($service);
    }

    public function create(){
        return response()->json();
    }

    public function store(Request $request){
        $this->validate($request,[
            'nomS'=>'required|string',
            'descriptionS'=>'required|string',
            'prixS'=>'required|numeric',
        ]);
        $service= new Service([
            'nomS'=>$request->input('nomS'),
            'descriptionS'=>$request->input('descriptionS'),
            'prixS'=>$request->input('prixS')
        ]);

        $service->save();
        return response()->json($service);
    }

    public function show(Service $service) {
        //$service = Service::findOrFail($id);
        return response()->json($service);
    }

    public function edit(Service $service){
        //$service = Service::findOrFail($id);
        return response()->json($service);
    }

    public function update(Request  $request, Service $service){
        //$service = Service::findOrFail($id);
        $this->validate($request, [
            'nomS'=>'required|string',
            'descriptionS'=>'nullable|string',
            'prixS'=>'required|numeric',
        ]);

        $service->nomS=$request->nomS;
        $service->descriptionS=$request->description;
        $service->prixS=$request->prixS;

        $service->update();
        return response()->json(['success'=>true, $service]);

    }

    public function delete($id){
        $service = Service::findOrFail($id);
        $service->delete();
        return response()->json(['success'=>true]);
    }
}
