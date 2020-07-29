@extends('pages.directeur.master_dir', ['title' => ' |Eleve'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('contenu_page')

<!-- Table -->
<div class="row">
    <div class="col">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Eleves</h3>
                <p class="text-sm mb-0">
                    Liste des  eleves de la classe (nom_classe)
                </p>
            </div>
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Ousmane</td>
                            <td>NDIAYE</td>
                            <td>Dakar</td>
                            <td>77 000 00 00</td>
                            <td class="clearfix">
                                <a
                                    class="btn btn-sm btn-success float-left"
                                    href="#" data-toggle="tooltip"
                                    data-original-title="Voir ses notes">
                                    <i class="fa fa-eye fa-lg fa-fw"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Ousmane</td>
                            <td>NDIAYE</td>
                            <td>00/00/0000</td>
                            <td>6ème</td>
                            <td class="clearfix">
                                <a
                                    class="btn btn-sm btn-success float-left"
                                    href="#" data-toggle="tooltip"
                                    data-original-title="Voir ses notes">
                                    <i class="fa fa-eye fa-lg fa-fw"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Ousmane</td>
                            <td>NDIAYE</td>
                            <td>00/00/0000</td>
                            <td>6ème</td>
                            <td class="clearfix">
                                <a
                                    class="btn btn-sm btn-success float-left"
                                    href="#" data-toggle="tooltip"
                                    data-original-title="Voir ses notes">
                                    <i class="fa fa-eye fa-lg fa-fw"></i>
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

{{--  Pour les fichier js dont ce page a besoin ici  --}}
@section('extra-js')

@endsection
