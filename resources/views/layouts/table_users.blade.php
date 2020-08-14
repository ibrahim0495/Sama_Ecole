    <table class="table table-flush" id="datatable-basic">
        <thead class="thead-light">
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($personnes as $personne)
                <tr>
                    <td>{{$personne->prenom}}</td>
                    <td>{{$personne->nom}}</td>
                    <td>{{$personne->telephone}}</td>
                    <td>{{$personne->adresse}}</td>
                    <td class="clearfix">
                    @if ($personne->etatPers)
                        <a
                            class="btn btn-sm btn-success float-left"
                            href="{{route($admin.'.'.$user.'.show', $personne->login)}}"
                            data-original-title="Voir le {{$user}}">
                            <i class="fa fa-eye fa-lg fa-fw"></i>
                        </a>
                    @else
                        <a
                            class="btn btn-sm btn-secondary float-left"
                            href="{{route($admin.'.'.$user.'.show', $personne->login)}}"
                            data-original-title="Voir le surveillant">
                            <i class="fa fa-eye fa-lg fa-fw"></i>
                        </a>
                    @endif

                        
                        <form action="{{ route($user.'.destroy', $personne->login) }}" method="POST" class="inline-block" onsubmit="return confirm('Voulez-vous supprimer le {{$user}} {{$personne->prenom}} {{$personne->nom}} ?')">
                            {{csrf_field() }}
                            @method('DELETE')
                            <button type="submit" class ="btn btn-sm btn-danger float-left"><i class="fa fa-trash fa-lg fa-fw"></i></button>
                        </form>
                    </td>
                    
                </tr>
            @endforeach
            

        </tbody>
    </table>