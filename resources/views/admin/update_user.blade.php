@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h1 class="fs-6 fw-bold mb-8">Modifier l'utilisateur</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Modifier l'utilisateur</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-4">
        <form method="POST" action="{{ route('update_userdb',$user->id) }}">
            @csrf
            @method('PATCH')

            <div class="row g-3">
                <!-- Nom -->
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <x-form-label for="nom" :value="__('Nom')" />
                    <input id="nom" class="form-control" type="text" name="nom"  required autofocus autocomplete="nom" value="{{$user->nom}}"/>
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>


                 <!-- Prenom -->
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <x-form-label for="prenom" :value="__('Prenom')" />
                    <input id="prenom" class="form-control" type="text" name="prenom"  required autofocus autocomplete="prenom" value="{{$user->prenom}}"/>
                    <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <x-form-label for="email" :value="__('Email')" />
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" value="{{$user->email}}"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


                <!-- Rôle -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <x-form-label for="role" :value="__('Role')" />
                    {{-- <x-text-input id="role" class="form-control" type="role" name="role" :value="old('role')" required autocomplete="role" /> --}}
                    <select id="role" class="form-control form-select" type="role" name="role" :value="old('role')" required autocomplete="role">
                        <option value="">Sélectionner un rôle</option>
                        @foreach (DB::table('roles')->get() as $role)
                        <option value="{{$role->name}}" @selected($user)>{{$role->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- Service -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <x-form-label for="service" :value="__('Service')" />
                     <select id="service" class="form-control form-select" type="service" name="service" :value="old('service')" required autocomplete="service">
                        @foreach ($services as $service)
                        <option value="{{$service->id}}" @selected($service->id==$user->id_service)>{{$service->service}}</option>
                        @endforeach

                    </select>
                    <x-input-error :messages="$errors->get('serice')" class="mt-2" />
                </div>
            </div>


            <x-button-primary class="ms-4">
                {{ __('Ajouter') }}
            </x-button-primary>
        </form>
    </div>
</div>
@endsection
