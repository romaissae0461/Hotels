@extends('layouts.master')


@section('contenu')

<div class="row" style="padding: 10px;">
    <div class="medium-12 columns">
        @if(Session::has('success'))
            <div class="alert-success">{{Session::get('success')}}</div>
        @endif
        <table class="stack">
            <thead>
                <tr>
                    <th width:"200">Chambre</th>
                    <th width:"200">Disponibilité</th>
                    <th width:"200">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td>{{$room->numC}}</td>
                        <td>
                            @if($room->status==1)
                                <div class="callout success">Disponible</div>
                            @else
                                <div class="callout warning">Réservée</div>
                            @endif
                        </td>
                        <td>
                            @if(isset(Auth::user()->id))
                                @if($room->status == 1)
                                    <a href="#" class="button success" data-open="myModal{{$room->id}}">Réserver</a>
                                    <div id="myModal{{$room->id}}" class="reveal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                                        <h2 id="modalTitle">Réservation pour: <b>{{Auth::user()->name}}</b></h2>
                                        <form action="{{route('reservations.store')}}" method="POST">
                                            <input type="hidden" name="_token" value="{{Session::token()}}">
                                            <input type="hidden" name="id" value="{{$room->id}}">
                                            <div class="medium-1 columns">De: </div>
                                            <div class="medium-2 columns">
                                                <input name="dateArrivee" value="<?php echo date('Y-m-d');?>" type="date">
                                            </div>
                                            <div class="medium-1 columns">A: </div>
                                            <div class="medium-2 columns">
                                                <input name="dateDepart" value="<?php echo date('Y-m-d');?>" type="date">
                                            </div>
                                            <div class="medium-2 columns">
                                                <input class="button" value="Valider" type="submit">
                                            </div>
                                        </form>
                                        <button class="close-button" data-close aria-label="Close modal" type="button">
                                            <span aria-hidden="true">x</span></button>
                                    </div>
                                @else
                                    <span class="label info">Sera disponible le: {{$reservation=App\Models\Reservation::where('id',$room->id)->first()->dateDepart}}</span>
                                @endif
                            @else
                                @if($rooms->status==1)
                                    <a href="{{route('login')}}" class="button success">Réserver</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection