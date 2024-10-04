@extends('layouts.base')
@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h1 class="fs-6 fw-bold mb-8">Gérer les utilisateurs</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Gérer les utilisateurs</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="display:flex; justify-content:space-between; align-items:center;">
                <h1 class="m-0 font-weight-bold text-primary" style="text-transform: uppercase;">Liste des utilisateurs du
                    système</h1>
                <div>
                    <a href="{{ route('add_user') }}" class="btn btn-primary" title="Ajouter"><i class="fas fa-user-plus"></i></a>
                    <a href="{{ route('roles') }}" class="btn btn-primary">Rôles</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>email</th>
                                <th>Service</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>

                                    <th>{{ $user->nom }}</th>
                                    <th>{{ $user->prenom }}</th>
                                    <th>{{ $user->email }}</th>
                                    <th>{{ $user->service }}</th>
                                    <th>{{ $user->getRoleNames()->first() }}</th>
                                    <th>
                                        <div>
                                            <a href="{{ route('update_user',$user->id) }}" class="btn btn-success mr-1">Modifier</a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-{{ $key }}">
                                                Supprimer
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal-{{ $key }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Suppression de
                                                                {{ $user->nom }} {{ $user->prenom }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Voulez vous vraiment supprimer cet utilisateur?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success"
                                                                data-bs-dismiss="modal">Non</button>
                                                            <form action="{{ route('delete_user') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" id="id" name="id"
                                                                    value="{{ $user->id }}">
                                                                <button class="btn btn-danger">Supprimer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
