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
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Tableau de bord</span>
                            </a>
                        </li>
                        {{--  Etablissement  --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-etablissement" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-etablissement">
                                <i class="ni ni-shop text-primary"></i>
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
                                        <a href="#" class="nav-link">
                                        <span class="sidenav-mini-icon"> M </span>
                                        <span class="sidenav-normal"> Modifier</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        {{--  Classe  --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-classe" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-classe">
                                <i class="ni ni-shop text-primary"></i>
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
                        {{--  Matiere  --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-matiere" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-matiere">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Matiere</span>
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
                        {{--  Surveillant  --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-surveillant" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-surveillant">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Surveillant</span>
                            </a>
                            <div class="collapse" id="navbar-surveillant">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('surveillant.create') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> E </span>
                                        <span class="sidenav-normal"> Enregistrer</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('surveillant.liste') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> L </span>
                                        <span class="sidenav-normal"> Lister</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        {{--  Eleve  --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-eleve" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-eleve">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Eleve</span>
                            </a>
                            <div class="collapse" id="navbar-eleve">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-toggle="modal" data-target="#staticBackdrop">
                                        <span class="sidenav-mini-icon"> E </span>
                                        <span class="sidenav-normal"> Voir</span>
                                        </a>
                                    </li>

                                    {{--Pop-up montrant un formulaire pour le choix de la classe du semetre et de la matiere--}}

                         <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Classes</h5><br>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <form action="{{ route('eleve.store')}}" method="POST" class="inline-block">
                                    <input type="hidden" name="profils" value="directeur">
                                        <div class="modal-body">
                                            {{  csrf_field() }}
                                            <div class="form-group">
                                                <label for="">nom classe</label>
                                                <select  class="form-control" name="nom-classe" value="" required>
                                                    <option>6emeA</option>
                                                    <option>TleC</option>
                                                    <option>4emeA</option>
                                                    <option>1èreB</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Année Scolaire</label>
                                                <select  class="form-control" name="annee" value="" required>
                                                    <option>2018-2019</option>
                                                    <option>2019-2020</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" name="" value="OK">
                                        </div>
                                    </form>

                                </div>
                            </div>
                         </div>
                                </ul>
                            </div>
                        </li>
                        {{--  Annee Scolaire  --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-annee" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-annee">
                                <i class="ni ni-shop text-primary"></i>
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
                                        <a href="{{ route('annee-scolaire.liste') }}" class="nav-link">
                                        <span class="sidenav-mini-icon"> L </span>
                                        <span class="sidenav-normal"> Lister</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="ni ni-calendar-grid-58 text-red"></i>
                                <span class="nav-link-text">Calendar</span>
                            </a>
                        </li>
                    </ul>

                </div>
        </div>
    </div>
</nav>
