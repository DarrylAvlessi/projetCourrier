@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
          <div class="row align-items-center">
            <div class="col-9">
              <h1 class="fs-6 fw-bold mb-8">Modifier un service</h1>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">Modifier un service</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
    </div>
    <div class="card p-4">
        <form action="{{route('update_servicedb')}}" method="POST">
            @csrf
            <div class="row">

                <div class="col-sm-12 col-md-12 col-lg-6">
                    <label for="id">ID</label>
                    <input class="form-control" type="text" value="{{$service->id}}" disabled>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <label for="service">Modifier le nom du service</label>
                    <input class="form-control" type="text" id="service" value="{{$service->service}}"  name="service">
                </div>
            </div>
            <input type="hidden" id="id" value="{{$service->id}}" name="id">
            <x-button-primary>Modifier</x-button-primary>
        </form>
    </div>
</div>

@endsection
