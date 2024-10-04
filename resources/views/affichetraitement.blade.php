@extends('layouts.base')
@section('content')

    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h1 class="fs-6 fw-bold mb-8">Mes traitements</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Mes traitements</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>date</th>
                                <th>Agent origine</th>
                                <th>fichier</th>
                                <th>Agent reçu</th>
                                <th>commentaire</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($traitements as $traitement)
                            <tr>
                                <td>{{ $traitement->date }}</td>
                                <td>{{$traitement->id_user_origine }} </td>
                                <td>
                                    @if($traitement->fichier)
                                        <i class="fas fa-file-pdf text-danger" style="font-size:20px;"></i><span> {{ ($traitement->fichier)}}

                                    @else
                                        {{ "Aucun fichier"}}

                                    @endif
                                </td>
                                <td>{{$traitement->id_user }}</td>
                                <td>{{ ($traitement->commentaire)?$traitement->commentaire: "Aucun commentaire"}}</td>
                                <td>
                                    <div style="display:flex;justify-content:center;">
                                        <a class="btn btn-success mr-1" href="/storage/{{$traitement->fichier}}" download>Télécharger</a>
                                        <a class="btn btn-primary" href="{{route('formulaire_affectation_service', ['id_affectation'=>$traitement->id_affectation])}}">Affecter</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection


