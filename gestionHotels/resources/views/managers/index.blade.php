@extends('layouts.app')

@section('styles')
@endsection

@section('content')

<div class="container">
    <div class="medium-12 columns">
        @if(Session::has('fail'))
            <div class="alert-danger">{{Session::get('fail')}}</div><br>
        @endif

        @if(Session::has('success'))
            <div class="alert-info">{{Session::get('success')}}</div><br>
        @endif

        <h4>Managers</h4>
        <hr>
        <a class="button primary" href="{{route('managers.create')}}">Ajouter</a>
        <table class="stack">
            <thead>
                <tr>
                    <th width="200">Nom et Prénom</th>
                    <th width="200">Email</th>
                    <th width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($managers as $manager)
                    <td>{{$manager->nomM}}</td>
                    <td>{{$manager->email}}</td>
                    <td>
                        <a class="button danger" href="{{route('manager.delete', ['id'=>$manager->id])}}">Supprimer</a>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('scripts')
@endsection