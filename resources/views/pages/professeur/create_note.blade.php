@extends('pages.professeur.master_prof',['title' => ' | Notes'])


@section('page-namer')

    <h6 class="h2 text-white d-inline-block mb-0">Classes-notes</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-pencil-ruler"></i></a></li>
            <li class="breadcrumb-item"><a href="#">Professeur</a></li>
        </ol>
    </nav>
@endsection

@section('contenu_page')
    <div class="row">
        <div class="card center">
            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable-basic">
                    <thead class="thead-light">
                        <tr>
                            <th>Matricule</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Devoir</th>
                            <th>Composition</th>
                        </tr>
                    </thead>
                    <tbody>
                    <form action="{{route('notes.store')}}" method="POST">
                        {{ csrf_field() }}
                        <tr>
                            <td>001221810</td>
                            <td>Hamidou</td>
                            <td>NDIAYE</td>
                            <td><input type="number" style="border-radius:2px " name='devoir' value='10'></td>
                            <td><input type="number" name='compo' value='10'></td>                        </tr>
                        <tr>
                            <td>001201910</td>
                            <td>Ousmane</td>
                            <td>NDIAYE</td>
                            <td><input type="number" name='devoir' value='20'></td>
                            <td><input type="number" name='compo' value='20'></td>
                        </tr>
                        <tr>
                            <td><input type="submit" class=" center btn btn-primary" value="Enregistrer"></td>
                        </tr>
                    </form>
                    </tbody>
                </table>
                <br>
            
        </div>
    </div>
@endsection