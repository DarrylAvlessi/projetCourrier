
@extends('layouts.base')
@section('content')
{{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900" >
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <div style="display:flex;justify-content:center;">
        <div class="container-fluid">

            <h3>Formulaire enregistrement nouveau courrier {{$type}}</h3>
            <form method="POST" action="{{route('enregistrementCourrier', ['type' =>$type])}}" enctype="multipart/form-data">
                @csrf

                <!-- date_ajout -->
                <div>
                    <x-form-label for="date_ajout" :value="__('Date enregistrement')" />
                    <x-form-input id="date_ajout" class="block mt-1 w-full" type="date" name="date_ajout"  />
                    <x-input-error :messages="$errors->get('date_ajout')" class="mt-2" />
                </div>

                <!-- date_recu -->
                @if ($type == 'arrivee')
                    <div>
                        <x-form-label for="date_recu" :value="__('Date de réception du document')" />
                        <x-form-input id="date_recu" class="block mt-1 w-full" type="date" name="date_recu"  />
                        <x-input-error :messages="$errors->get('date_recu')" class="mt-2" />
                    </div>
                @endif

                <!-- expéditeur ou destinataire -->
                @if ($type == 'arrivee')
                    <div>
                        <x-form-label for="expediteur" :value="__('Expediteur')" />
                        <x-form-input id="expediteur" class="block mt-1 w-full" type="text" name="expediteur"  />
                        <x-input-error :messages="$errors->get('expediteur')" class="mt-2" />
                    </div>
                @else
                    <div>
                        <x-form-label for="destinataire" :value="__('Destinataire')" />
                        <x-form-input id="destinataire" class="block mt-1 w-full" type="text" name="destinataire"  />
                        <x-input-error :messages="$errors->get('destinataire')" class="mt-2" />
                    </div>
                @endif

                <!-- objet -->
                <div>
                    <x-form-label for="objet" :value="__('Motif')" />
                    <textarea id="objet" class="block mt-1 w-full" type="text" name="objet" rows="2"></textarea>
                    <x-input-error :messages="$errors->get('objet')" class="mt-2" />
                </div>
                <br>


                <!-- fichier -->
                <div>
                    <button>
                    <input type="file" id="avatar" name="avatar"/>
                    <x-input-error :messages="$errors->get('avatar')"  />
                    </button>
                </div>
                <br>
                    <button type="submit" class="ms-4 btn btn-primary">
                        {{ __('Enregistrer') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
<div class="container-fluid">
    <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h1 class="fs-6 fw-bold mb-8">Enregistrer un courrier {{$type}}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Enregistrer un courrier {{$type}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-4">
        <form method="POST" action="{{route('enregistrementCourrier', ['type' =>$type])}}" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">
                    <!-- numero de référence -->
                    @if ($type == 'arrivee')
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <x-form-label for="numero_reference" :value="__('Numéro de référence')" />
                        <x-form-input id="numero_reference" class="block mt-1 w-full" type="text" name="numero_reference"  required/>
                        <x-input-error :messages="$errors->get('numero_reference')" class="mt-2" />
                    </div>
                    @endif
                    <!-- date_ajout -->
                    <div class="col-sm-12 col-md-12 @if ($type == 'arrivee') col-lg-4 @else col-lg-6 @endif">
                        <x-form-label for="date_ajout" :value="__('Date enregistrement')" />
                        <x-form-input id="date_ajout" class="block mt-1 w-full" type="date" name="date_ajout"  required/>
                        <x-input-error :messages="$errors->get('date_ajout')" class="mt-2" />
                    </div>
                    <!-- date_recu -->
                    @if ($type == 'arrivee')
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <x-form-label for="date_recu" :value="__('Date de réception du document')" />
                            <x-form-input id="date_recu" class="block mt-1 w-full" type="date" name="date_recu" required />
                            <x-input-error :messages="$errors->get('date_recu')" class="mt-2" />
                        </div>
                    @endif

                    <!-- expéditeur ou destinataire -->
                    @if ($type == 'arrivee')
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <x-form-label for="expediteur" :value="__('Expediteur')" />
                            <x-form-input id="expediteur" class="block mt-1 w-full" type="text" name="expediteur" required />
                            <x-input-error :messages="$errors->get('expediteur')" class="mt-2" />
                        </div>
                    @else
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <x-form-label for="destinataire" :value="__('Destinataire')" />
                            <x-form-input id="destinataire" class="block mt-1 w-full" type="text" name="destinataire" required />
                            <x-input-error :messages="$errors->get('destinataire')" class="mt-2" />
                        </div>
                    @endif
                    <!-- objet -->
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <x-form-label for="objet" :value="__('Motif')" />
                        <textarea id="objet" class="form-control" type="text" name="objet" rows="2"></textarea>
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
