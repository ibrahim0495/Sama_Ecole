@extends('pages.surveillant.master_surveillant', ['title' => ' |Eleve'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/style_upload_img.css') }}">
@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Surveillant</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{ route('surveillant.index') }}"><i class="fas fa-home"></i>Accueil</a></li>
            <li class="breadcrumb-item"><a href="#">Accueil</a></li>
            <li class="breadcrumb-item active" aria-current="page">Info élève</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    <div class="row">
        {{-- Infos parent --}}
        <div class="col-xl-5 order-xl-2">
            <div class="card card-profile">
                <img src="{{ asset('../../assets/img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">                                    
                                @if ($parent->nomImgPers == null)
                                    <img src="{{ asset('photos_profils/avatar_male.png') }}" class="rounded-circle">
                                @else
                                    <img src="{{ asset('photos_profils/') }} {{ $parent->nomImgPers }}" class="rounded-circle">
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
                                    <span class="heading text-lowercase">{{ $parent->login_parent }}</span>
                                    <span class="description">Login</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="h3">Infos du parent ou tuteur</h5>
                        <h5 class="h3">
                            {{ $parent->prenom }} {{ $parent->nom }}
                        </h5>
                        <h5 class="h3">
                            {{ $parent->adresse }}
                        </h5>
                        <h5 class="h3">
                            {{ $parent->telephone }}
                        </h5>
                        <h5 class="h3">
                            {{ $parent->email }}
                        </h5>
                        <h5 class="h3">
                            @if ($nombre_enfants >= 2)                                
                                Nombre d'enfants : {{ $nombre_enfants }}
                            @else
                                Nombre d'enfant : {{ $nombre_enfants }}
                            @endif
                        </h5>
                        @foreach ($infos_enfant as $item)
                            <a href="{{ route('surveillant.show', $item->loginEleve ) }}"
                                data-original-title="Voir l'élève" class="btn-link">
                                {{ $item->loginEleve }}
                            </a>
                        @endforeach
                        <div>
                            <i class="ni education_hat mr-2"></i>{{ session('etablissement') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 order-xl-2"></div>
        {{-- Info éleve --}}
        <div class="col-xl-5 order-xl-2">
            <div class="card card-profile">
                <img src="{{ asset('../../assets/img/theme/img-1-1000x600.jpg') }}" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">  
                            @if ($eleve->nomImgPers == null && $eleve->sexe === 'Garçon')  
                                <div class="picture-container">
                                    <div class="picture">
                                        <img src="{{ asset('photos_profils/avatar_male.png') }}"
                                        class="picture-src rounded-circle" id="wizardPicturePreview" 
                                        title="Cliquez ici pour ajouter une image">
                                        <input type="file" id="wizard-picture" class="">
                                        <i class="camera-compact"></i>
                                    </div>
                                    <h6 class="">Choose Picture</h6>
                                </div>                              
                            @elseif ($eleve->nomImgPers == null && $eleve->sexe === 'Fille')
                                <div class="picture-container">
                                    <div class="picture">
                                        <img src="{{ asset('photos_profils/avatar_female.png') }}"
                                        class="picture-src rounded-circle" id="wizardPicturePreview" 
                                        title="Cliquez ici pour ajouter une image">
                                        <input type="file" id="wizard-picture" class="">
                                    </div>
                                    <h6 class="">Choose Picture</h6>
                                </div>
                            @else
                                <div class="picture-container">
                                    <div class="picture">
                                        <img src="{{ asset('photos_profils/') }} {{ $eleve->nomImgPers }}"
                                        class="picture-src rounded-circle" id="wizardPicturePreview" 
                                        title="Cliquez ici pour ajouter une image">
                                        <input type="file" id="wizard-picture" class="">
                                    </div>
                                    <h6 class="">Choose Picture</h6>
                                </div>
                            @endif
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
                                    <span class="heading text-lowercase">{{ $eleve->loginEleve }}</span>
                                    <span class="description">Login</span>
                                </div>
                                <div>
                                    <span class="heading">{{ $eleve->code }}</span>
                                    <span class="description">Matricule</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="h3">Infos de l'élève</h5>
                        <h5 class="h3">
                            {{ $eleve->prenom }} {{ $eleve->nom }}
                        </h5>
                        <h5 class="h3">
                            {{ $eleve->dateNaissance }} à {{ $eleve->lieuNaissance }}
                        </h5>
                        <h5 class="h3">
                            @if ($eleve->telephone == null)
                                Aucun numéro de téléphone
                            @else
                                {{ $eleve->telephone }}
                            @endif
                        </h5>
                        <h5 class="h3">
                            {{ $eleve->sexe }}
                        </h5>
                        <div>
                            <i class="ni education_hat mr-2"></i>{{ session('etablissement') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

{{--  Pour les fichier js dont ce page a besoin ici  --}}
@section('extra-js')
    <script src="{{ asset('js/upload_img.js') }}"></script>
    <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
@endsection
