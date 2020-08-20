@extends('pages.comptable.master_comptable', ['title' => ' | Inscription'])

@section('extra-css')

@endsection

@section('breadcrumb')
    <h6 class="h2 text-white d-inline-block mb-0">Comptable</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="{{ route('comptable.index') }}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item"><a href={{ route('comptable.index') }}>Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('payement.create') }}">Payement</a></li>
            <li class="breadcrumb-item active" aria-current="page">Payement</li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    <div class="row">
        @include('layouts._partials.show_eleve')
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    @foreach ($info_annee_sco as $item)
                        <button
                            class="btn btn-icon btn-primary" type="button" data-toggle="collapse"
                            data-target="#collapseAnneeScolaire"
                            aria-expanded="false"
                            aria-controls="collapseAnneeScolaire">
                            <span class="btn-inner--text">{{ $item->nom_anneesco }}</span>
                        </button>
                    @endforeach
                </div>

                <div class="card-body">
                    <div class="collapse" id="collapseAnneeScolaire">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Mois</th>
                                        <th scope="col">Inscription</th>
                                        <th scope="col">Menualité</th>
                                        <th scope="col">Reliquat</th>
                                        <th scope="col">Statut</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($mois as $m)
                                        <tr>
                                            <td>
                                                {{ $m->nom_mois }}
                                            </td>
                                            <td>
                                                {{ $m->nom_mois }}
                                            </td>
                                            <td>
                                                {{ $m->nom_mois }}
                                            </td>
                                            <td>
                                                {{ $m->nom_mois }}
                                            </td>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-warning"></i>
                                                    <span class="status">pending</span>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
