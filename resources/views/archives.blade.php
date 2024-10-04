@extends('layouts.base')
@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h1 class="fs-6 fw-bold mb-8">Archives</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Archives</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="display:flex;justify-content:space-between; align-items:center;">
                <h3 class="m-0 font-weight-bold text-primary">Courriers arrivée archivés</h3>
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
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                       <tbody>
                        @foreach ($courrier_arrivee_archives as $key=>$courrier_arrivee_archive)
                            <tr class="text-capitalize">
                                <th>{{$courrier_arrivee_archive->date_recu}}</th>
                                <th>{{$courrier_arrivee_archive->date_ajout}}</th>
                                <th>{{$courrier_arrivee_archive->expediteur}}</th>
                                {{-- <th><i class="fas fa-file-pdf text-danger" style="font-size:20px;"></i><span>{{$courrier_arrivee_archive->fichier}}</span></th> --}}
                                <th>{{$courrier_arrivee_archive->objet}}</th>
                                <th>{{$courrier_arrivee_archive->status}}</th>
                                <th>
                                <div>
                                    <a href="/storage/{{$courrier_arrivee_archive->fichier}}" download class="btn btn-success">Télécharger</a>
                                </div>
                                </th>
                            </tr>
                        @endforeach

                       </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="display:flex;justify-content:space-between; align-items:center;">
                <h3 class="m-0 font-weight-bold text-primary">Courriers départ archivés</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr class="text-capitalize">

                                <th>Date départ</th>
                                <th>Destinataire</th>
                                <th>Objet</th>
                                {{-- <th>Fichier</th> --}}
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                       <tbody>

                        @foreach ($courrier_depart_archives as $key=>$courrier_depart_archive)
                        <tr>
                            <th>{{$courrier_depart_archive->date_depart}}</th>
                            <th>{{$courrier_depart_archive->destinataire}}</th>
                            <th>{{$courrier_depart_archive->objet}}</th>
                            {{-- <th><i class="fas fa-file-pdf text-danger" style="font-size:20px;"></i><span>{{$courrier_depart_archive->fichier}}</span></th> --}}
                            <th>{{$courrier_depart_archive->status}}</th>
                            <th>
                            <div>
                                <a href="/storage/{{$courrier_depart_archive->fichier}}" download class="btn btn-success">Télécharger</a>
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
