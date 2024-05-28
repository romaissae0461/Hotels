@extends('layouts.app')

@section('styles')
@endsection

@section('content')

<div class="row">
    <div class="medium-offset-4 medium-11 columns">
        <h4>Inscription Manager</h4>
        <form action="{{route('managers.store')}}" method="POST">
            @foreach($errors->all() as $error)
                <div class="alert-danger">{{$$error}}</div>
            @endforeach

            <div class="medium-4 columns">
                <label class="label info">Nom et Prénom</label>
                <input name="nomM" type="text" placeholder="Votre nom complet">
            </div>

            <div class="medium-4 columns">
                <label class="label info">Email</label>
                <input name="email" type="email" placeholder="exemple@gmail.com">
                <input name="_token" type="hidden" value="{{Session::token()}}">
            </div>

            <div class="medium-4 columns">
                <label class="label info">Mot de passe</label>
                <input name="password" type="password">
            </div>

            <div class="medium-4 columns">
                <input value="Valider" class="button success" type="submit">
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
@endsection