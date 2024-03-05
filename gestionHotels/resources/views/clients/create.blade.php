@extends('layouts.master')



@section('contenu')

<div class="row">
    <div class="medium-offset-4 medium-11 columns">
        <h4>Inscription</h4>
        <div class="mt-4">
            @if(session()->has("success"))
            <div class="alert alert-success">
                {{session()->get("success")}}
            </div>
            @endif
        </div>
        <form action="{{route('clients.store')}}" method='POST'>
            @foreach($errors->all() as $error)
            <div class="alert-danger">{{$error}}</div><br>
            @endforeach
            <hr>

            <div class="medium-4 columns">
                <label class="label info">Nom</label>
                <input name="nomC" type="text" placeholder="Votre Nom">
            </div>

            <div class="medium-4 columns">
                <label class="label info">Prenom</label>
                <input name="prenom" type="text" placeholder="Votre prénom">
            </div>

            <div class="medium-8 columns">
                <label class="label info">Adresse</label>
                <input name="adresse" type="text" placeholder="Votre adresse">
            </div>

            <div class="medium-4 columns">
                <label class="label info">Telephone</label>
                <input name="telephone" type="text" placeholder="Votre numéro de telephone">
            </div>

            <div class="medium-4 columns">
                <label class="label info">Email</label>
                <input name="email" type="text" placeholder="Votre email">
            </div>

            <div class="medium-4 columns">
                <label class="label info">Mot De Passe</label>
                <input name="password" type="password" placeholder="Mot de passe">
                <input name="_token" type="hidden" value="{{Session::token()}}">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{route('clients.index')}}" class="btn btn-danger">Annuler</a>

        </form>
    </div>
</div>

@endsection

