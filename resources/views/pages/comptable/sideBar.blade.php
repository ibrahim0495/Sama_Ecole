<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  d-flex  align-items-center">
                <a class="navbar-brand" href="#">
                    <img src="{{ ('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
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
                            {{--
                                <li class="nav-item">
                                    <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                                        <i class="ni ni-shop text-primary"></i>
                                        <span class="nav-link-text">Ajouter</span>
                                    </a>
                                    <div class="collapse show" id="navbar-dashboards">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                <span class="sidenav-mini-icon"> D </span>
                                                <span class="sidenav-normal">Etablissement</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                <span class="sidenav-mini-icon"> A </span>
                                                <span class="sidenav-normal"> Salle de classe</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                <span class="sidenav-mini-icon"> A </span>
                                                <span class="sidenav-normal"> Classe</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                <span class="sidenav-mini-icon"> A </span>
                                                <span class="sidenav-normal"> Matiere</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                <span class="sidenav-mini-icon"> A </span>
                                                <span class="sidenav-normal"> Surveillant</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            --}}

                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="ni ni-archive-2 text-green"></i>
                                    <span class="nav-link-text">Inscription</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="ni ni-chart-pie-35 text-info"></i>
                                    <span class="nav-link-text">Réinscription</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="ni ni-calendar-grid-58 text-red"></i>
                                    <span class="nav-link-text">Payement</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Divider -->
                        <hr class="my-3">
                    </div>
            </div>
        </div>
    </nav>
