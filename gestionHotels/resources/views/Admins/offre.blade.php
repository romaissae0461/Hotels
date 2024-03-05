@extends('layouts.master')

@section('contenu')


<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 ">
                        <h1 class="mt-4">Offres Hôtels</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Hôtels</li>
                        
                        </ol>
                        
                        <div class="d-flex align-content-end">
                            <a href="{{route('admin.addHotel')}}" class="btn btn-primary">Ajouter un hôtel</a>
                        </div><br>

                        <div class="offres-container">
        @foreach($offres as $hotel)
            @include('hotel', ['hotel' => $hotel])
        @endforeach
    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Hôtels 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
</div>


@endsection
