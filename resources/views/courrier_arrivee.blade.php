@extends('layouts.base')
@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h1 class="fs-6 fw-bold mb-8">Courriers arrivée</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Courriers arrivée</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-end" style="display:flex; justify-content:space-between; align-items:center;">
                <h1 class="m-0 font-weight-bold text-primary" style="text-transform: uppercase;">Liste des courriers arrivée</h1>
                <a href="{{route('enregistrementCourrier', ['type' => 'arrivee'])}}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>Date Arrivée</th>
                                <th>Date enregistrement</th>
                                <th>Expéditeur</th>
                                {{-- <th>Fichier</th> --}}
                                <th>Objet</th>
                                {{-- <th>Status</th> --}}
                                <th>Référence</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                       <tbody>
                        @foreach ($courriers as $key=>$courrier)
                            <tr>
                                <th>{{$courrier->date_recu}}</th>
                                <th>{{$courrier->date_ajout}}</th>
                                <th>{{$courrier->expediteur}}</th>
                                {{-- <th><i class="fas fa-file-pdf text-danger" style="font-size:20px;"></i><span>{{$courrier->fichier}}</span></th> --}}
                                <th>{{$courrier->objet}}</th>
                                {{-- <th>{{$courrier->status}}</th> --}}
                                <th>{{$courrier->numero_reference}}</th>
                                <th>
                                <div style="display:flex;justify-content:center;">
                                    <a class="btn btn-primary mr-1" href="{{route('affecterService',['idCourrierArrivee'=>$courrier->id])}}"> Affecter</a>
                                    <a class="btn btn-secondary mr-1" href="{{route('modifier_courrier',$courrier->id)}}"> Modifier</a>
                                    <a href="/storage/{{$courrier->fichier}}" download class="btn btn-success">Télécharger</a>
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
