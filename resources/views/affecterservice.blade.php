@extends('layouts.base')
@section('content')

{{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <div style="display:flex;justify-content:center;">
            <div class="container-fluid">
                <div class="brand-logo d-flex align-items-center justify-content-center">

                    <img src="{{ asset('images/profile/poster.png') }}" width="100" height="100" alt=""/><br>

                </div><br>

            <h3 class="text-center">Affecter un courrier</h3>
    <form method="POST" action="{{route('affecterservice', ['id'=>$id, 'id_courrier_arrivee'=>$id_courrier_arrivee, 'id_service'=>$id_service])}}" enctype="multipart/form-data">
         @csrf
           <!-- date_recu -->

            <div>
                 <x-form-label for="date" :value="__('Date affectation')" />
                 <x-form-input id="date" class="block mt-1 w-full" type="date" name="date"  />
                 <x-input-error :messages="$errors->get('date')" class="mt-2" />
             </div><br>

            <div>
            <x-form-label for="idservice" :value="__('Service')" />
            <select id="idservice" class="block mt-1 w-full" type="service" name="idservice" :value="old('idservice')" required autocomplete="idservice">
                @foreach($services as $service)
                <option value="{{$service->id }}">{{$service->service }}</option>
                @endforeach
            </select><br>
            <div>
                <x-form-label for="instruction" :value="__('Instruction')" />
                <textarea name="instruction" id="instruction" cols="" rows="3"></textarea>
                <x-input-error :messages="$errors->get('instruction')" class="mt-2" />
            </div><br>

         <!-- fichier -->
         <div>
             <button>
             <input type="file" id="avatar" name="avatar"/>
             <x-input-error :messages="$errors->get('avatar')"  />
             </button>
         </div><br>


             <x-primary-button class="ms-4 btn btn-primary">
                 {{ __('Enregistrer') }}
             </x-primary-button>
         </div>
    </form>

    </div> --}}
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
        <form method="POST" action="{{route('affecterservice', ['id'=>$id, 'id_courrier_arrivee'=>$id_courrier_arrivee, 'id_service'=>$id_service])}}" enctype="multipart/form-data">
            @csrf
              <!-- date_recu -->

              <div class="row g-3">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <x-form-label for="date" :value="__('Date affectation')" />
                    <x-form-input id="date" class="form-control" type="date" name="date"  />
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <x-form-label for="idservice" :value="__('Service')" />
                    <select id="idservice" class="form-select" type="service" name="idservice" :value="old('idservice')" required autocomplete="idservice">
                        @foreach($services as $service)
                        <option value="{{$service->id }}">{{$service->service }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <x-form-label for="instruction" :value="__('Instruction')" />
                    <textarea name="instruction" id="instruction" cols="" rows="3" class="form-control"></textarea>
                    <x-input-error :messages="$errors->get('instruction')" class="mt-2" />
                </div>
                <!-- fichier -->
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <input type="file" id="avatar" name="avatar" class="form-control border p-2"/>
                    <x-input-error :messages="$errors->get('avatar')"  />
                </div>
              </div>
              <x-button-primary>{{ __('Enregistrer') }}</x-button-primary>




            </div>
       </form>
    </div>
</div>
@endsection

