
@extends('layouts.base')
@section('content')

<div class="container-fluid">
    <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h1 class="fs-6 fw-bold mb-8">Modifier courrier arrivée</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Modifier courrier arrivée</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-4">
        <form method="POST" action="{{route('modifier_courrier', $courrier->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <!-- numero de référence -->

                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <x-form-label for="numero_reference" :value="__('Numéro de référence')" />
                        <x-form-input id="numero_reference" class="block mt-1 w-full" type="text" name="numero_reference"  required value="{{$courrier->numero_reference}}"/>
                        <x-input-error :messages="$errors->get('numero_reference')" class="mt-2" />
                    </div>

                    <!-- date_ajout -->
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <x-form-label for="date_ajout" :value="__('Date enregistrement')" />
                        <x-form-input id="date_ajout" class="block mt-1 w-full" type="date" name="date_ajout"  required value="{{$courrier->date_ajout}}"/>
                        <x-input-error :messages="$errors->get('date_ajout')" class="mt-2" />
                    </div>
                    <!-- date_recu -->

                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <x-form-label for="date_recu" :value="__('Date de réception du document')" />
                            <x-form-input id="date_recu" class="block mt-1 w-full" type="date" name="date_recu" required value="{{$courrier->date_recu}}"/>
                            <x-input-error :messages="$errors->get('date_recu')" class="mt-2" />
                        </div>


                    <!-- expéditeur ou destinataire -->

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <x-form-label for="expediteur" :value="__('Expediteur')" />
                            <x-form-input id="expediteur" class="block mt-1 w-full" type="text" name="expediteur" required value="{{$courrier->expediteur}}"/>
                            <x-input-error :messages="$errors->get('expediteur')" class="mt-2" />
                        </div>

                    <!-- objet -->
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <x-form-label for="objet" :value="__('Motif')" />
                        <textarea id="objet" class="form-control" type="text" name="objet" rows="2">{{$courrier->objet}}</textarea>
                        <x-input-error :messages="$errors->get('objet')" class="mt-2" />
                    </div>
                    <!-- fichier -->
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="file" id="avatar" name="avatar" class="form-control p-2 border"/>
                        <x-input-error :messages="$errors->get('avatar')"  />
                    </div>
                </div>
                <x-button-primary>
                    {{ __('Enregistrer') }}
                </x-button->
            </form>
    </div>
</div>

@endsection
