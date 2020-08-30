
@csrf
<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <h4 class="mb-0">Informations personnelles du Surveillant</h4>
        </div>
    </div>
    {{-- Prénoms --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="InputPrénom">Prénom</label>
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input
                    type="text" class="form-control" placeholder="Saisir le(s) prénom(s)"
                    value="{{ old('prenom') ?? ''}}" name="prenom">
            </div>
            {!! $errors->first('prenom', '<div class="text-danger">:message</div>')!!}
        </div>
    </div>

    {{-- Nom --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="InputNom">Nom</label>
                <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Saisir le nom" value="{{ old('nom') ?? ''}}" name="nom">
            </div>
            {!! $errors->first('nom', '<div class="text-danger">:message</div>')!!}

        </div>
    </div>

    {{-- Téléphone --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="InputTéléphone">Téléphone</label>
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-globe-americas"></i></span>
                </div>
                <input class="form-control" placeholder="Numéro de téléphone" type="text" value="{{ old('telephone') ?? ''}}" name="telephone">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
            </div>
            {!! $errors->first('telephone', '<div class="text-danger">:message</div>')!!}
        </div>
    </div>

    {{-- Email --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="InputEmail">Email</label>
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input class="form-control" placeholder="Email address" type="email" value="{{ old('email') ?? ''}}" name="email">
            </div>
            {!! $errors->first('email', '<div class="text-danger">:message</div>')!!}
        </div>
    </div>

    {{-- Adresse --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="InputAdresse">Adresse</label>
            <div class="input-group input-group-merge">
                <input class="form-control" placeholder="Adresse" type="text" value="{{ old('adresse') ?? ''}}" name="adresse">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-map-marker"></i></span>
                </div>
            </div>
            {!! $errors->first('adresse', '<div class="text-danger">:message</div>')!!}
        </div>
    </div>

    {{-- Langue --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="example2cols2Input">Langue</label>
            <select name="langue" class="form-control" id="example2cols2Select" data-toggle="select">
                <option value="ENG">Anglais</option>
                <option value="AR">Arabe</option>
                <option value="FR">Français</option>
            </select>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-lg btn-block btn-primary">
    Enregistrer
</button>

