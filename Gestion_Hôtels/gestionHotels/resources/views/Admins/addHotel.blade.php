@extends('layouts.master')


@section('contenu')

<h1>Ajouter un hôtel</h1>
<form method="POST" action="{{ route('admin.storeHotel') }}">
    @csrf

    <label for="nomH">Nom de l'hôtel:</label>
    <input type="text" id="nomH" name="nomH" required>


    <label for="nbrChambre">Nombre des chambres</label>
    <input type="number" id="nbrChambre" name="nbrChambre" required>

    <label for="email">email:</label>
    <input type="text" id="email" name="email" required>

    <label for="adresse">Adresse:</label>
    <input type="text" id="adresse" name="adresse" required>

    
    <label for="type_hotel_id" class="form-label">Type d'Hôtel</label>
    <select class="form-control" name="type_hotel_id" required>
        <option value=""></option>
        @foreach($typehotels as $typehotel)
        <option value="{{$typehotel->id}}">{{$typehotel->typeH}}</option>
        @endforeach
    </select>
    <button type="submit" >Ajouter l'hôtel</button>
</form>

@endsection