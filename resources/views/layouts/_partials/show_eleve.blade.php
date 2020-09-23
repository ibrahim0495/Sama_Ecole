<div class="col-xl-4 order-xl-2">
    @foreach ( $info_eleve as $item)
        <div class="card card-profile">
            <img src="../../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                    <div class="card-profile-image">
                        <a href="#">
                            @if ($item->nomImgPers == null && $item->sexe === 'Garçon')
                                <img src="photos_profils/avatar_male.png" class="rounded-circle">
                            @elseif ($item->nomImgPers == null && $item->sexe === 'Fille')
                                <img src="photos_profils/avatar_female.png" class="rounded-circle">
                            @else
                                <img src="photos_profils/{{ $item->nomImgPers }}" class="rounded-circle">
                            @endif
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between"></div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col">
                        <div class="card-profile-stats d-flex justify-content-center">
                            <div>
                                <span class="heading">{{ $item->loginEleve }}</span>
                                <span class="description">Login</span>
                            </div>
                            <div>
                                <span class="heading">{{ $item->code }}</span>
                                <span class="description">Matricule</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h5 class="h3">
                        {{ $item->prenom }} {{ $item->nom }}
                    </h5>
                    <h5 class="h3">
                        {{ $item->dateNaissance }} à {{ $item->lieuNaissance }}
                    </h5>
                    <h5 class="h3">
                        @if ($item->telephone == null)
                            Aucun numéro de téléphone
                        @else
                            {{ $item->telephone }}
                        @endif
                    </h5>
                    <h5 class="h3">
                        {{ $item->sexe }}
                    </h5>
                    <div>
                        <i class="ni education_hat mr-2"></i>{{ session('etablissement') }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
