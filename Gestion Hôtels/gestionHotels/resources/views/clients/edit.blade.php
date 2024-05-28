@extends('layouts.master')

@section('contenu')

<div class="row">
    <div class="medium-offset-4 medium-11 columns">
        <h4>Modification</h4>
        <div class="mt-4">
            @if(session()->has("success"))
            <div class="alert alert-success">
                {{session()->get("success")}}
            </div>
            @endif
        </div>
        <form action="{{route('clients.update', ['client'=>$client->idC])}}" method="POST">
            @csrf
            @method('PUT')
            @foreach($errors->all() as $error)
                <div class="alert-danger">{{$error}}</div><br>
            @endforeach
            <hr>
            <div class="medium-4 columns">
                <label class="label info">Nom: </label>
                <input name="nomC" type="text" placeholder="Votre nom" value="{{$client->nomC}}">
            </div>

            <div class="medium-4 columns">
                <label class="label info">Prénom: </label>
                <input name="prenom" type="text" placeholder="Votre prenom" value="{{$client->prenom}}">
            </div>

            <div class="medium-4 columns">
                <label class="label info">Adresse: </label>
                <input name="adresse" type="text" placeholder="Votre adresse" value="{{$client->adresse}}">
            </div>

            <div class="medium-4 columns">
                <label class="label info">Telephone: </label>
                <input name="telephone" type="text" placeholder="Votre numéro de telephone" value="{{$client->telephone}}">
            </div>

            <div class="medium-4 columns">
                <label class="label info">Email: </label>
                <input name="email" type="text" placeholder="Votre adresse email" value="{{$client->email}}">
            </div>

            
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  <a href="{{route('clients.index')}}" class="btn btn-danger">Annuler</a>
        </form>
    </div>
</div>

@endsection

