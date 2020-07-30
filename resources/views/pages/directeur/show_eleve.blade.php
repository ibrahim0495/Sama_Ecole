@extends('pages.directeur.master_directeur', ['title' => ' |Eleve'])

{{--  Pour les css dont ce page a besoin ici  --}}
@section('extra-css')

@endsection

@section('contenu_page')
<div class="container">
    <div class="card-body">
        <form method="POST" action="{{route('eleve')}}">
            @csrf
            <select class="form-control" data-toggle="select" name="nom_classe" required>
                @foreach ($classe)

                    <option>{{$classe->nom}}</option>

                @endforeach
            </select>

            <select class="form-control" data-toggle="select" name="annee" required>
                @foreach ($anneeScolaire as annee)

                    <option>{{annee->nom_anneesco}}</option>

                @endforeach
            </select>

        </form>
      </div>
    </div>
 </div>


@endsection

{{--  Pour les fichier js dont ce page a besoin ici  --}}
@section('extra-js')

@endsection
