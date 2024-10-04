
@extends('layouts.base')

@section('content')

<div class="container-fluid">
    <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h1 class="fs-6 fw-bold mb-8">Affecter un courrier à un service</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Affecter un courrier à un service</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-4">
        <form method="POST"  action="{{route('affectation', ['id' =>$idCourrierArrivee])}}" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <!-- date_recu -->
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <x-form-label for="date" :value="__('Date affectation')" />
                    <x-form-input id="date" class="block mt-1 w-full" type="date" name="date"  />
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6">
                    <x-form-label for="idservice" :value="__('Service')" />
                    {{-- <x-form-input id="idservice" class="block mt-1 w-full" type="idservice" name="idservice" :value="old('idservice')" required autocomplete="idservice" /> --}}
                    <select id="idservice" class="block mt-1 w-full" type="service" name="idservice" :value="old('idservice')" required autocomplete="idservice">
                        @foreach($services as $service)
                        <option value="{{$service->id }}">{{$service->service }}</option>
                        @endforeach
                    </select>

                    <input type="hidden" value="{{$idCourrierArrivee}}" name='idcourrier'>

                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- instruction -->
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <x-form-label for="instruction" :value="__('Instruction')" />
                    <textarea id="instruction" class="form-control" type="text" name="instruction" rows="2"></textarea>
                    <x-input-error :messages="$errors->get('instruction')" class="mt-2" />
                </div>


                <!-- fichier -->
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <input type="file" id="avatar" name="avatar" class="form-control border p-2"/>
                    <x-input-error :messages="$errors->get('avatar')"  />
                </div>
            </div>
                <x-button-primary>
                    {{ __('Affecter') }}
                </x-button-primary>
            </div>
        </form>
    </div>
</div>



@endsection
