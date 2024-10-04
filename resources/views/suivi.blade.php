@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h1 class="fs-6 fw-bold mb-8">Suivre un courrier</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Suivre un courrier</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-4">
        <span class="text-center fs-5">Entrez le numéro de référence du courrier</span>
        <form action="{{route('suivre_courrier_post')}}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <x-form-input id="numero_reference" class="block mt-3 w-full" type="text" name="numero_reference"  required/>
                    <x-input-error :messages="$errors->get('numero_reference')" class="mt-2" />
                </div>
            </div>

            <div class="mt-3 text-center">
                <button class="btn btn-primary">
                    {{ __('Suivre') }}
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
@section('script')
<script>
    $.post('/suivre_courrier_post', {
        
    })
</script>
@endsection
