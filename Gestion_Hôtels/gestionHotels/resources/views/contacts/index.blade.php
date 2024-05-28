@extends('layouts.master')

@section('contenu')

<div class="container">
    <div class="medium-12 columns">
        @if(Session::has('fail'))
            <div class="alert-danger">{{Session::get('fail')}}</div><br>
        @endif

        @if(Session::has('success'))
            <div class="alert-success">{{Session::get('success')}}</div><br>
        @endif

        <h4>Contacts Messages</h4>
        <hr>
        <table class="stack">
            <thead>
                <tr>
                    <th width="200">Nom et Prénom</th>
                    <th width="200">Email</th>
                    <th width="200">Message</th>
                    <th width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{str_limit($contact->message)}}</td> 
                        <!-- str_limit(): est une fonction qui prend 3 args:
                    le premier est la chaine de caracteres que je veux limiter
                    le deuxieme est le nombre max de caracteres que je veux afficher
                    le troisieme est une chaine de caracteres optionnelle qui sera ajoutee a la fin de la chaine de car si elle est tronquee -->

                        <td>
                            <a class="button warning" href="{{route('contacts.delete', ['id'=>$contact->id])}}">Supprimer</a>
                            <a class="button info" href="#" data-open="myModal{{$contact->id}}">Voir</a>
                            <div id="myModal{{$contact->id}}" class="reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                                <h2 id="modalTitle">Message de: <b>{{$contact->email}}</b></h2>
                                <p class="lead">{{$contact->message}}</p>
                                <button class="close-button" data-close aria-label="Close modal" type="button">
                                    <span aria-hidden="true">x</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection