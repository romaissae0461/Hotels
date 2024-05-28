@extends('layouts.master')

@section('contenu')

<div class="row">
    <div class="medium-offset-4 medium-11 columns">
        <h4>Nous contacter</h4>
        <form action="{{route('contacts.store')}}" method="POST">
            @foreach($errors->all() as $error)
                <div class="alert-danger">{{$error}}</div>
            @endforeach
            @if(Session::has('fail'))
                <div class="alert-danger">{{Session::get('fail')}}</div><br>
            @endif
            @if(Session::has('success'))
                <div class="alert-success">{{Session::get('success')}}</div><br>
            @endif
            <hr>
            <div class="medium-4 columns">
                <label class="label info">Nom et Prénom</label><br>
                <input name="name" type="text" placeholder="Votre nom">
            </div>

            <div class="medium-4 columns">
                <label class="label info">Email</label><br>
                <input name="email" type="text" placeholder="exemple@gmail.com">
            </div>

            <div class="medium-4 columns">
                <label class="label info">Message</label><br>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Message moins de 5000 mots"></textarea>
                <input name="_token" type="hidden" value="{{Session::token()}}">
            </div>

            <div class="medium-4 columns">
                <input value="Valider" class="button success" type="submit">
            </div>
        </form>
    </div>
</div>

@endsection