<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
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
                            <a class="nav-link" href="{{ route('surveillant.index') }}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Tableau de bord</span>
                            </a>
                        </li>
                        {{--  Professeur  --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-professeur" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-professeur">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Professeur</span>
                            </a>
                            <div class="collapse" id="navbar-professeur">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{  route('professeur.create') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> E </span>
                                            <span class="sidenav-normal">Enregistrer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('professeur.index') }}" class="nav-link">
                                            <span class="sidenav-mini-icon"> L </span>
                                            <span class="sidenav-normal"> Lister</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <span class="sidenav-mini-icon"> A </span>
                                        <span class="sidenav-normal"> Affecter une classe</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{--  Absence  --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-absences" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-absences">
                                <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Absence</span>
                            </a>
                            <div class="collapse" id="navbar-absences">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <span class="sidenav-mini-icon"> E </span>
                                        <span class="sidenav-normal">Enregistrer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <span class="sidenav-mini-icon"> L </span>
                                        <span class="sidenav-normal"> Lister</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{--  Retard  --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-retard" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-retard">
                                <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Retard</span>
                            </a>
                            <div class="collapse" id="navbar-retard">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <span class="sidenav-mini-icon"> E </span>
                                        <span class="sidenav-normal">Enregistrer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <span class="sidenav-mini-icon"> L </span>
                                        <span class="sidenav-normal"> Lister</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{--  Emploi du temps  --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-edt" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-edt">
                                <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Emploi du temps</span>
                            </a>
                            <div class="collapse" id="navbar-edt">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <span class="sidenav-mini-icon"> C </span>
                                        <span class="sidenav-normal">Créer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <span class="sidenav-mini-icon"> V </span>
                                        <span class="sidenav-normal"> Voir</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{--  Notes  --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-notes" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-notes">
                                <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Notes élèves</span>
                            </a>
                            <div class="collapse" id="navbar-notes">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <span class="sidenav-mini-icon"> V </span>
                                        <span class="sidenav-normal"> Voir </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        {{--  Bulletin de notes  --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-bulletins" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-bulletins">
                                <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">Bulletin de notes</span>
                            </a>
                            <div class="collapse" id="navbar-bulletins">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <span class="sidenav-mini-icon"> C </span>
                                        <span class="sidenav-normal">Créer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <span class="sidenav-mini-icon"> V </span>
                                        <span class="sidenav-normal"> Voir</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('eleve.create') }}">
                                <i class="ni ni-hat-3 text-green"></i>
                                <span class="nav-link-text">Nos classes</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                </div>
        </div>
    </div>
</nav>
