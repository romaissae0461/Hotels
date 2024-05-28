<div class="hotel-box">
    <img src="{{ asset($hotel->image) }}" alt="{{ $hotel->nomH }}" class="img-fluid">
    <h3>{{ $hotel->nomH }}</h3>
    <p>{{ $hotel->nbrChambre }}</p>
    <p>{{ $hotel->adresse }}</p>
    <p>{{ $hotel->email }}</p>
    <p>{{ $hotel->typeH }}</p>
</div>
