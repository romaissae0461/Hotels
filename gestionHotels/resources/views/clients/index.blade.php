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
        <h4>Clients</h4>
        <hr>
        <table class="stack">
            <thead>
                <tr>
                    <th width="200">id</th>
                    <th width="200">Nom</th>
                    <th width="200">Prénom</th>
                    <th width="200">Email</th>
                    <th width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->idC}}</td>
                        <td>{{$client->nomC}}</td>
                        <td>{{$client->prenom}}</td>
                        <td>{{$client->email}}</td>
                        <td>
                            <a class="button warning" href="{{route('clients.edit', ['client'=>$client->idC])}}">Modifier</a>
                            <a class="button info" href="{{route('clients.show', ['id'=>$client->idC])}}">Voir</a>
                            <a href="#" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer ce client?')){document.getElementById('form-{{$client->idC}}').submit()}">Supprimer</a>

                            <form id="form-{{$client->idC}}" action="{{route('clients.delete',
                                ['id'=>$client->idC])}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

