@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h1 class="fs-6 fw-bold mb-8">Suivi du courrier N°{{$courrier->numero_reference}}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Suivi du courrier N°{{$courrier->numero_reference}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-4">
        <!-- Timeline 1 - Bootstrap Brain Component -->
        <section class="bsb-timeline-1 py-5 py-xl-8">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-md-8 col-xl-6">

                <ul class="timeline">
                    @forelse ($actions as $affectation)
                    <li class="timeline-item">
                    <div class="timeline-body">
                        <div class="timeline-content">
                        <div class="card border-0">
                            <div class="card-body p-3">
                            <h5 class="card-subtitle text-secondary mb-1">{{\Carbon\Carbon::parse($affectation->date)->format('d/m/Y')}}</h5>
                            <h2 class="card-title mb-3">Affectation</h2>
                            <p class="card-text m-0 mb-2">Le courrier a été affecté au service <strong>{{$affectation->service_arrivee->service}}</strong> par le service <strong>{{$affectation->service_origine->service}}</strong>.</p>
                            <strong><span>Instruction : </span></strong>{{$affectation->instruction ?? 'N/A'}}
                            </div>
                        </div>
                        </div>
                    </div>
                    </li>
                    @empty
                    <li class="timeline-item">
                        <div class="timeline-body">
                            <div class="timeline-content">
                            <div class="card border-0">
                                <div class="card-body p-3">
                                <h5 class="card-subtitle text-secondary mb-1">Aucune action effectuée sur ce courrier pour le moment</h5>

                                </div>
                            </div>
                            </div>
                        </div>
                        </li>
                    @endforelse


                </ul>

                </div>
            </div>
            </div>
        </section>
    </div>
</div>
@endsection
