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

                        {{--Tableau de bord du professeur et page d'acceuil--}}
                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('professeurs.index')}}">
                                <i class="ni ni-chart-pie-35 text-primary"></i>
                                <span class="nav-link-text">Tableau de bord</span>
                            </a>
                        </li>
                        {{--Messages recus et envoyes --}}
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('professeur.messages')}}">
                                <i class="ni ni-send text-success"></i>
                                <span class="nav-link-text">Messages</span>
                            </a>
                        </li>

                        {{--  Notes des eleves  --}}
                        <li class="nav-item">
                            <a class="nav-link"  href="#" data-toggle="modal" data-target="#staticBackdrop">
                                <i class="ni ni-ruler-pencil text-teal"></i>
                                <span class="nav-link-text">Notes</span>
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
                                <form action="{{ route('notes.store')}}" method="POST" class="inline-block">
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
                                                <label for="">semestre</label>
                                                <select  class="form-control" name="semestre" value="" required>
                                                    <option>1er semestre</option>
                                                    <option>2eme semestre</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">nom matiere</label>
                                                <select  class="form-control" name="semestre" value="" required>
                                                    <option>Anglais</option>
                                                    <option>Esspagnol</option>
                                                    <option>Francais</option>
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
                        
                        {{--  Classes  --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-notes" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-notes">
                                <i class="ni ni-shop text-yellow"></i>
                            <span class="nav-link-text">Classes</span>
                            </a>
                            <div class="collapse" id="navbar-notes">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="modal" data-target="#classe">
                                        <span class="sidenav-mini-icon"></span>
                                        <span class="sidenav-normal"> Voir </span>
                                        </a>
                                    </li>
                                   {{--<li class="nav-item">
                                        <a href="#" class="nav-link">
                                        <span class="sidenav-mini-icon"></span>
                                        <span class="sidenav-normal"></span>
                                        </a>
                                    </li>--}} 
                                </ul>
                            </div>
                        </li>
                        <div class="modal fade" id="classe" data-backdrop="static" data-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Classes</h5><br>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('professeurs.classes')}}" method="POST" class="inline-block">
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
                                        </div>
                                        <div class="modal-footer">
                                        <input type="submit" class="btn btn-primary" name="" value="OK">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        {{--  Emploi du temps  du professeur--}}
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-bulletins" >
                                <i class="ni ni-calendar-grid-58 text-dark"></i>
                            <span class="nav-link-text">Emploi du temps</span>
                            </a>
                           
                        </li>

                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                </div>
        </div>
    </div>
</nav>
