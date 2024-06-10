<?php

namespace App\Http\Controllers;

use App\Models\Facturation;
use Illuminate\Http\Request;

class factureController extends Controller
{

    public function index()
    {
        $facturations = Facturation::all();
        return response()->json($facturations);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'idC' => 'required|integer',
            'idReserv' => 'required|integer',
            'idS' => 'required|integer',
            'prixC' => 'required|numeric'
        ]);

        $prixC = $request->input('prixC');
        $tax = $prixC * 0.20;
        $totalPrix = $prixC + $tax;

        $facturation = new Facturation([
            'idC' => $request->input('idC'),
            'idReserv' => $request->input('idReserv'),
            'idS' => $request->input('idS'),
            'prixC' => $prixC,
            'tax' => $tax,
            'totalPrix' => $totalPrix
        ]);

        $facturation->save();

        return response()->json($facturation);
    }
    public function show($id)
    {
        $facturation = Facturation::findOrFail($id);
        return response()->json($facturation);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'idC' => 'required|exists:clients,id',
            'idReserv' => 'required|exists:reservations,id',
            'idS' => 'required|exists:services,id',
            'prixC' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0',
            'totalPrix' => 'required|numeric|min:0',
        ]);

        $facturation = Facturation::findOrFail($id);
        $facturation->update($request->all());

        return response()->json($facturation, 200);
    }

    public function delete($id)
    {
        Facturation::findOrFail($id)->delete();
        return response()->json('Deleted Successfully', 204);
    }

}
