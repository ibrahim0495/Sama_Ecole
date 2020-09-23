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
                                                    {{ $mensualite}}
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
                                                    <button 
                                                        type="button" data-toggle="modal" data-target="#payement"
                                                        class="button btn-sm btn-primary">Payer</button>
                                                @elseif ($m->reliquat > 0 )
                                                    <a href="#" class="button btn-sm btn-warning">Completer</a>
                                                @else
                                                    <a href="#" class="button btn-sm btn-success">En règle</a>
                                                @endif
                                                
                                            </td>
                                        </tr>
                                        {{-- Modal ici --}}
                                        <div class="modal fade" id="payement" tabindex="-1" role="dialog" aria-labelledby="new-event-label" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
                                                <div class="modal-content">
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form id="newModalForm" class="new-event--form" method="POST" action="{{ route('payement-mensuel') }}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label class="form-control-label">Payement mois {{ $m->nom_mois }} </label>
                                                                <input 
                                                                    type="text" id="montant" name="montant" placeholder="Saisir le montant reçu ici"
                                                                    class="form-control form-control-alternative"
                                                                    onKeypress="if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
                                                                        if(event.which < 45 || event.which > 57) return false;" maxlength="9"/>
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Payer</button>
                                                                <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Fermer</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                              </div>
                                            </div>
                                          </div>
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
