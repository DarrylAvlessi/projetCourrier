@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h1 class="fs-6 fw-bold mb-8">Ajouter un utilisateur</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Ajouter un utilisateur</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card p-4">
        <form method="POST" action="{{ route('add_userdb') }}">
            @csrf

            <div class="row g-3">
                <!-- Nom -->
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <x-form-label for="nom" :value="__('Nom')" />
                    <input id="nom" class="form-control" type="text" name="nom"  required autofocus autocomplete="nom" />
                    <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                </div>


                 <!-- Prenom -->
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <x-form-label for="prenom" :value="__('Prenom')" />
                    <input id="prenom" class="form-control" type="text" name="prenom"  required autofocus autocomplete="prenom" />
                    <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <x-form-label for="email" :value="__('Email')" />
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <x-form-label for="password" :value="__('Mot de passe')" />

                    <input id="password" class="form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="col-sm-12 col-md-12 col-lg-4">
                    <x-form-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

                    <input id="password_confirmation" class="form-control"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>


                <!-- Rôle -->
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <x-form-label for="role" :value="__('Role')" />
                    {{-- <x-text-input id="role" class="form-control" type="role" name="role" :value="old('role')" required autocomplete="role" /> --}}
                    <select id="role" class="form-control form-select" type="role" name="role" :value="old('role')" required autocomplete="role">
                        <option value="agent">agent</option>
                        <option value="chef service">chef service</option>
                        <option value="admin">Administrateur</option>
                        <option value="chef service directeur">chef service directeur</option>
                        <option value="chef service secretaire">chef service secretaire</option>
                        <option value="agent secretaire">agent secretaire</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>

                <!-- Service -->
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <x-form-label for="service" :value="__('Service')" />
                     <select id="service" class="form-control form-select" type="service" name="service" :value="old('service')" required autocomplete="service">
                        @foreach ($services as $service)
                        <option value="{{$service->id}}">{{$service->service}}</option>
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
