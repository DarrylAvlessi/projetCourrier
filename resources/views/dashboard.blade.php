@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <a href="{{ route('courrier_depart') }}">

                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-2x fa-envelope"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers text-center fs-5">
                                        <p class="fw-bolder card-category">Courriers départ</p>
                                        <h4 class="card-title">{{\App\Models\CourrierDepart::count()}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <a href="{{ route('courrier_arrivee') }}">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-2x fa-envelope-open"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers text-center fs-5">
                                        <p class="fw-bolder card-category">Courriers arrivée</p>
                                        <h4 class="card-title">{{\App\Models\CourrierArrivee::count()}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <a href="{{ route('afficheaffectation') }}">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-2x fa-paper-plane"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers text-center fs-5">
                                        <p class="fw-bolder card-category">Mes affectations</p>
                                        <h4 class="card-title">{{\App\Models\Affectation::count()}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <a href="{{ route('show_archives') }}">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-2x fa-luggage-cart"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                    <div class="numbers text-center fs-5">
                                        <p class="fw-bolder card-category">Archives</p>
                                        <h4 class="card-title">{{\App\Models\CourrierArrivee::where('status','archivé')->count()+\App\Models\CourrierDepart::where('status','archivé')->count()}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3 text-end" style="display:flex; justify-content:space-between; align-items:center;">
                    <h1 class="m-0 font-weight-bold text-primary" style="text-transform: uppercase;">Derniers courriers départ</h1>
                    <a href="{{route('courrier_depart')}}" class="btn btn-dark">Tout voir</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th>Date départ</th>
                                    <th>Destinataire</th>
                                    <th>Objet</th>
                                    {{-- <th>Fichier</th> --}}
                                    <th>status</th>
                                </tr>
                            </thead>
                           <tbody>

                            @foreach (\App\Models\CourrierDepart::orderByDesc('date_depart')->limit(5)->get() as $key=>$courrier)
                            <tr>
                                <th>{{$courrier->date_depart}}</th>
                                <th>{{$courrier->destinataire}}</th>
                                <th>{{$courrier->objet}}</th>
                                {{-- <th><i class="fas fa-file-pdf text-danger" style="font-size:20px;"></i><span>{{$courrier->fichier}}</span></th> --}}
                                <th>{{$courrier->status}}</th>
                            </tr>
                        @endforeach


                           </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-end" style="display:flex; justify-content:space-between; align-items:center;">
                <h1 class="m-0 font-weight-bold text-primary" style="text-transform: uppercase;">Derniers courriers arrivée</h1>
                <a href="{{route('courrier_arrivee')}}" class="btn btn-dark">Tout voir</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date Arrivée</th>
                                <th>Date enregistrement</th>
                                <th>Expéditeur</th>
                                {{-- <th>Fichier</th> --}}
                                <th>Objet</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                       <tbody>
                        @foreach (\App\Models\CourrierArrivee::orderByDesc('date_recu')->limit(5)->get() as $key=>$courrier)
                            <tr>
                                <th>{{$courrier->date_recu}}</th>
                                <th>{{$courrier->date_ajout}}</th>
                                <th>{{$courrier->expediteur}}</th>
                                {{-- <th><i class="fas fa-file-pdf text-danger" style="font-size:20px;"></i><span>{{$courrier->fichier}}</span></th> --}}
                                <th>{{$courrier->objet}}</th>
                                <th>{{$courrier->status}}</th>
                            </tr>
                        @endforeach

                       </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
