<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
            </a>
            <div class=" ml-auto ">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('directeur.index') }}">
                                <i class="fas fa-home text-primary"></i>
                                <span class="nav-link-text">Tableau de bord</span>
                            </a>
                        </li>

                        {{--  Etablissement  --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-etablissement" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-etablissement">
                                <i class="ni ni-building text-primary"></i>
                                <span class="nav-link-text">Etablissement</span>
                            </a>
                            <div class="collapse" id="navbar-etablissement">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('etablissement.create') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> E </span>
                                        <span class="sidenav-normal">Enregistrer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('etablissement.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> L </span>
                                        <span class="sidenav-normal"> lister</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{--  Classe  --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-classe" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-classe">
                                <i class="ni ni-planet text-primary"></i>
                                <span class="nav-link-text">Classe</span>
                            </a>
                            <div class="collapse" id="navbar-classe">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('classe.create') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> E </span>
                                        <span class="sidenav-normal"> Enregistrer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('classe.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> L </span>
                                        <span class="sidenav-normal"> Lister</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{--  Salle Classe  --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-salleClasse" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-salleClasse">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Salle de Classes</span>
                            </a>
                            <div class="collapse" id="navbar-salleClasse">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('salle_classe.create') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> E </span>
                                        <span class="sidenav-normal"> Enregistrer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('salle_classe.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> L </span>
                                        <span class="sidenav-normal"> Lister</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{--  Matiere  --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-matiere" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-matiere">
                                <i class="ni ni-books text-primary"></i>
                                <span class="nav-link-text">Matieres</span>
                            </a>
                            <div class="collapse" id="navbar-matiere">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('matiere.create') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> E </span>
                                        <span class="sidenav-normal"> Enregistrer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('matiere.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> L </span>
                                        <span class="sidenav-normal"> Lister</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{--  Comptable  --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-comptable" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-comptable">
                                <i class="fa fa-user-alt text-primary"></i>
                                <span class="nav-link-text">Comptables</span>
                            </a>
                            <div class="collapse" id="navbar-comptable">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('directeur.comptable.create')}}" class="nav-link">
                                        <span class="sidenav-mini-icon"> E </span>
                                        <span class="sidenav-normal"> Enregistrer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="{{route('directeur.comptable.liste')}}" class="nav-link">
                                        <span class="sidenav-mini-icon"> L </span>
                                        <span class="sidenav-normal"> Lister</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{-- Surveillant --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-surveillant" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-surveillant">
                                <i class="fa fa-user-alt text-primary"></i>
                                <span class="nav-link-text">Surveillants</span>
                            </a>
                            <div class="collapse" id="navbar-surveillant">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('directeur.surveillant.create') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> E </span>
                                        <span class="sidenav-normal"> Enregistrer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('directeur.surveillant.liste') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> L </span>
                                        <span class="sidenav-normal"> Lister</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{--  Eleve  --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('directeur.liste.classeAnnee')}}">
                                <i class="ni ni-hat-3 text-primary"></i>
                                <span class="nav-link-text">Nos élèves</span>
                            </a>
                        </li>

                        {{--  Annee Scolaire  --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-annee" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-annee">
                                <i class="ni ni-calendar-grid-58 text-primary"></i>
                                <span class="nav-link-text">Année Scolaire</span>
                            </a>
                            <div class="collapse" id="navbar-annee">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('annee-scolaire.create') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> E </span>
                                        <span class="sidenav-normal"> Enregistrer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('annee-scolaire.index') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> L </span>
                                        <span class="sidenav-normal"> Lister</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="ni ni-calendar-grid-58 text-red"></i>
                                <span class="nav-link-text">Calendar</span>
                            </a>
                        </li> --}}
                    </ul>

                </div>
        </div>
    </div>
</nav>
