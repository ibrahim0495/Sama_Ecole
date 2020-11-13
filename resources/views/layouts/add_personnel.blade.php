
@csrf
<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <h4 class="mb-0">Informations personnelles du {{ $profils }}</h4>
        </div>
    </div>

    {{-- Prénoms --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="InputPrénom">
                Prénom <strong class="text-warning">*</strong>
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user text-primary"></i>
                    </span>
                </div>
                <input
                    type="text" class="form-control @error('prenom') is-invalid @enderror" 
                    placeholder="Prénom(s)" value="{{ old('prenom') ?? '' }}" name="prenom"/>
            </div>
                {!! $errors->first('prenom', '<div class="text-danger">:message</div>')!!}
        </div>
    </div>

    {{-- Nom --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="InputNom">
                Nom <strong class="text-warning">*</strong>
            </label>
                <div class="input-group">
                    <input 
                        type="text" class="form-control @error('nom') is-invalid @enderror" 
                        placeholder="Nom" value="{{ old('nom') ?? '' }}" name="nom">
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fas fa-user text-primary"></i>
                        </span>
                    </div>
            </div>
            {!! $errors->first('nom', '<div class="text-danger">:message</div>')!!}

        </div>
    </div>

    {{-- Téléphone --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="InputTéléphone">
                Téléphone <strong class="text-warning">*</strong>
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-globe-americas text-primary"></i>
                    </span>
                </div>
                <input 
                    class="form-control @error('telephone') is-invalid @enderror" name="telephone"
                    placeholder="Numéro de téléphone" type="text" value="{{ old('telephone') ?? '' }}"
                    onKeypress="if(event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
                        if(event.which < 45 || event.which > 57) return false;" maxlength="9"/>
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fas fa-phone text-primary"></i>
                    </span>
                </div>
            </div>
            {!! $errors->first('telephone', '<div class="text-danger">:message</div>')!!}
        </div>
    </div>

    {{-- Email --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="InputEmail">
                Email <strong class="text-warning">*</strong>
            </label>
            <div class="input-group">
                <input 
                    class="form-control @error('email') is-invalid @enderror" type="email"
                    placeholder="Adresse E-mail" value="{{ old('email') ?? ''}}" name="email"/>
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fas fa-envelope text-primary"></i>
                    </span>
                </div>
            </div>
            {!! $errors->first('email', '<div class="text-danger">:message</div>')!!}
        </div>
    </div>

    {{-- Adresse --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="InputAdresse">
                Adresse <strong class="text-warning">*</strong>
            </label>
            <div class="input-group">
                <input 
                    class="form-control @error('adresse') is-invalid @enderror" name="adresse"
                    placeholder="Adresse" type="text" value="{{ old('adresse') ?? '' }}" />
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fas fa-map-marker text-primary"></i>
                    </span>
                </div>
            </div>
            {!! $errors->first('adresse', '<div class="text-danger">:message</div>')!!}
        </div>
    </div>

    {{-- Langue --}}
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="example2cols2Input">
                Langue <strong class="text-warning">*</strong>
            </label>
            <select name="langue" class="form-control" id="example2cols2Select" data-toggle="select">
                <option value="Français">Français (Par défaut)</option>
                <option value="Anglais">Anglais</option>
                <option value="Arabe">Arabe</option>
            </select>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-lg btn-block btn-primary">
    Enregistrer
</button>

