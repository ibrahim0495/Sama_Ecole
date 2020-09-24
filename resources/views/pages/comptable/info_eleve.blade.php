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
                {{-- Message de payement réussi --}}
                @if (session('success_payement'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                        <span class="alert-text"><strong>Erreur!</strong> {{ session('success_payement') }}</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-header">
                    <button
                        class="btn btn-icon btn-primary" type="button" data-toggle="collapse"
                        data-target="#collapseAnneeScolaire"
                        aria-expanded="false"
                        aria-controls="collapseAnneeScolaire">
                        <span class="btn-inner--text">Mensualité {{ $nom_annee_sco }}</span>
                    </button>
                </div>

                <div class="card-body">
                    <div class="collapse" id="collapseAnneeScolaire">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Mois</th>
                                        <th scope="col">Mensualité</th>
                                        <th scope="col">Reliquat</th>
                                        <th scope="col">Statut</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($mois as $m)
                                        <tr>
                                            <td>
                                                {{ $m->nom_mois }}
                                            </td>
                                            <td>
                                                {{ $mensualite}}
                                            </td>
                                            <td>
                                                @if ($m->reliquat === NULL)
                                                    {{ $mensualite }}
                                                @else
                                                    {{ $m->reliquat }}
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-warning"></i>
                                                    <span class="status">pending</span>
                                                </span>
                                            </td>
                                            <td>
                                                @if ($m->reliquat === NULL)
                                                    <a 
                                                        href="{{ 
                                                        route('effectuer-payement', 
                                                        ['mensualite_id' => $m->mensualite_id, 'mois_id' => $m->mois_id,
                                                        'loginEleve' => $loginEleve, 'code' => $code, 
                                                        'anneeScolaire' => $m->anneeScolaire_id, 'montant' => $mensualite]) 
                                                        }}" type="button" class="button btn-sm btn-primary">Payer</a>
                                                @elseif ($m->reliquat > 0 )
                                                    <a 
                                                    href="{{ 
                                                        route('effectuer-payement', 
                                                        ['mensualite_id' => $m->mensualite_id, 'mois_id' => $m->mois_id,
                                                        'loginEleve' => $loginEleve, 'code' => $code, 
                                                        'anneeScolaire' => $m->anneeScolaire_id, 'montant' => $m->reliquat]) 
                                                        }}" type="button" class="button btn-sm btn-warning">Completer</a>
                                                @else
                                                    <a href="#" class="button btn-sm btn-success">En règle</a>
                                                @endif
                                                
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

    {{-- Validation Modal --}}
    @if (count($errors) > 0)
    <script type="text/javascript">
        $( document ).ready(function() {
             $('#payement').modal('show');
        });
    </script>
  @endif
@endsection

@section('extra-js')
@endsection
