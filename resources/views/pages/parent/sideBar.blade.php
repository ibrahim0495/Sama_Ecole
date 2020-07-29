<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  d-flex  align-items-center">
                <a class="navbar-brand" href="#">
                    <h2>Sama Ecole</h2>
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
                            <a href="{{route('parentEleve.index')}}" class="nav-link">
                                <span class="sidenav-mini-icon"> E </span>
                                <i class="ni ni-align-left-2 text-default"></i>
                                <span class="nav-link-text"><h4> enfants</h4></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <span class="sidenav-mini-icon"> N </span>
                                <i class="ni ni-bell-55"></i>
                                <span class=""><h4>Notifications</h4></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <span class="sidenav-mini-icon"> M </span>
                                <i class="ni ni-ungroup"></i>
                                <span class="nav-link-text"><h4>Mensualité</h4></span>
                                </a>
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
    </nav>
