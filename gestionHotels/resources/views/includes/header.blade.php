<div class="top-bar">
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text">HAJZ</li>
      <li>
        <a href="/"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
      </li>  
      <li><a href="{{route('reservations.index')}}"><i class="fa fa-book" aria-hidden="true"></i> Résérvations</a></li>
      <li><a href="{{route('contacts.create')}}"><i class="fa fa-envelope" aria-hidden="true"></i> Contact</a></li>
      
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu">
         @if(!isset(Auth::user()->id))
            <li><a href="{{route('clients.create')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Inscription</a></li>
            <li><a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Connexion</a></li>
         @else
            <li><a href="{{route('clients.logout')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Déconnexion</a></li>
         @endif
    </ul>
  </div>
</div>
                                                        
                                                    