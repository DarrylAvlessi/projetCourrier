@extends('layouts.base')
@section('content')


    {{-- <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div style="display:flex;justify-content:center;">
                <div class="container-fluid">
                    <h2 class="text-center">Affecter un courrier à un agent </h2>
                    <form method="POST" action="{{route('traitement_agent_service', ['id_affectation'=>$id_affectation])}}" enctype="multipart/form-data">
                        @csrf
                        <!-- date_recu -->

                            <div class='mb-1'>
                                <x-input-label for="date" :value="__('Date affectation')" />
                                <x-text-input id="date" class="block mt-1 w-full" type="date" name="date"  />
                                <x-input-error :messages="$errors->get('date')" class="mt-2" />
                            </div><br>

                            <div>
                                <x-input-label for="nom" :value="__('Nom et prenoms')" />
                                <select id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autocomplete="nom">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->nom }} {{$user->prenom }}</option>
                                    @endforeach
                                </select>
                            </div><br>

                            <div class='mb-1'>
                                <x-input-label for="commentaire" :value="__('commentaire')" />
                                <textarea name="commentaire" id="commentaire"></textarea>
                                <x-input-error :messages="$errors->get('commentaire')" class="mt-2" />
                            </div><br>



                        <!-- fichier -->
                        <div>
                            <button>
                            <input type="file" id="avatar" name="avatar"/>
                            <x-input-error :messages="$errors->get('avatar')"  />
                            </button>
                        </div><br>


                            <x-primary-button class="ms-4 btn btn-primary">
                                {{ __('Affecter') }}
                            </x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="container-fluid">
        <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
              <div class="row align-items-center">
                <div class="col-9">
                  <h1 class="fs-6 fw-bold mb-8">Affecter un courrier à un agent</h1>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                      </li>
                      <li class="breadcrumb-item" aria-current="page">Affecter un courrier à un agent</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
        </div>
        <div class="card p-4">
        <form method="POST" action="{{route('traitement_agent_service', ['id_affectation'=>$id_affectation])}}" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class='mb-1'>
                        <x-form-label for="date" :value="__('Date affectation')" />
                        <x-form-input id="date" type="date" name="date"  />
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div>
                        <x-form-label for="nom" :value="__('Agent')" />
                        <select id="nom" class="form-select" type="text" name="nom" :value="old('nom')" required autocomplete="nom">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->nom }} {{$user->prenom }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class='col-sm-12 col-md-12 col-lg-12'>
                    <x-form-label for="commentaire" :value="__('commentaire')" />
                    <textarea name="commentaire" id="commentaire" class="form-control"></textarea>
                    <x-input-error :messages="$errors->get('commentaire')" class="mt-2" />
                </div>
                <!-- fichier -->
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <input type="file" id="avatar" name="avatar" class="form-control p-2 border"/>
                    <x-input-error :messages="$errors->get('avatar')"/>
                </div>
            </div>
            <x-button-primary>
                {{ __('Affecter') }}
            </x-button-primary>
        </form>
        </div>
    </div>

@endsection
