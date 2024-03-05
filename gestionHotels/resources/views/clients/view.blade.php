@extends('layouts.master')


@section('contenu')

<div class="row">
    <div class="medium-offset-4 medium-6 columns">
        <div class="card" style="width: 100%;padding:10%;">
            <div class="card-section">
                <p><span class="label success">Nom et Prénom: </span> {{$client->nomC.' '.$client->prenom}}
            </p>
            <p><small><span class="label success">Adresse: </span>{{$client->adresse}}</small></p>
            <p><span class="label success">Telephone: </span>{{$client->telephone}}</p>
            <p><span class="label success">Email: </span>{{$client->email}}</p>
            </div>
        </div>
    </div>
</div>

@endsection

