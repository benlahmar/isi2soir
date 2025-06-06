@extends('layouts.default')
@section('content')
<h1>Créer un Utilisateur</h1>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Formulaire de Création d'Utilisateur</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>   
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('utilisateurs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="log">Login:</label>
                <input type="text" class="form-control" id="log" name="log" required>   
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" class="form-control" id="password" name="pass" required>
            </div>
           
            <button type="submit" class="btn btn-primary">Créer</button>    
        </form>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <a href="{{ route('utilisateurs.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@stop