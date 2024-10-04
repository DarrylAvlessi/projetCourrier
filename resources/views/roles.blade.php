@extends('layouts.base')
@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card bg-secondary-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h1 class="fs-6 fw-bold mb-8">Gérer les rôles</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="/dashboard">Accueil</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Gérer les rôles</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header py-3" style="display:flex; justify-content:space-between; align-items:center;">
                <h1 class="m-0 font-weight-bold text-primary" style="text-transform: uppercase;">Liste des rôles</h1>
                <!-- Button trigger modal -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#new_role" class="btn btn-primary"><i class="fas fa-user-plus"></i> Nouveau rôle</button>


                <!-- Modal -->
                <div
                    class="modal fade"
                    id="new_role"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="modalTitleId"
                    aria-hidden="true"
                >
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">
                                    Nouveau rôle
                                </h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('store_role') }}" method="post" id="add_role">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Nom du rôle</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="role"
                                            name="role"
                                        />
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button
                                    type="button"
                                    class="btn btn-secondary"
                                    data-bs-dismiss="modal"
                                >
                                    Fermer
                                </button>
                                <button type="button" class="btn btn-primary" onclick="$('#add_role').submit()">Enregistrer</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class=""></th>
                                @foreach (\Spatie\Permission\Models\Role::all() as $role)
                                <th class="text-center">{{$role->name}}<br>


                                        <form action="{{ route('delete_role', ['role' => $role->id]) }}" method="post" class="d-inline-flex">
                                            @csrf
                                            @method('delete')
                                            {{-- <a class="btn btn-icon text-primary flex-end" data-bs-toggle="tooltip" href="#" aria-label="Modifier Role" data-bs-original-title="Modifier Role">
                                                <i class="ti ti-pencil fs-5"></i>
                                            </a> --}}
                                            <button type="submit" class="btn btn-icon text-danger" data-bs-toggle="tooltip" href="#" aria-label="Supprimer Role" data-bs-original-title="Supprimer Role" onclick="return confirm('Êtes-vous sur de vouloir supprimer ce role ?')">
                                                <i class="ti ti-trash fs-5">@if(\App\Models\User::with('roles')->get()->filter(
                                                    fn ($user) => $user->roles->where('id',$role->id)->toArray()
                                                )->count()!==0)!@endif</i>
                                            </button>
                                        </form><br>

                                    <input class="form-check-input" type="checkbox" name="selectAllPermissionsFor{{$role->id}}" onclick="$('input:checkbox[id^=pm{{$role->id}}]').prop('checked', this.checked);" @checked($role->hasAllPermissions(\Spatie\Permission\Models\Permission::all()))>
                                </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('update_roles') }}" method="post" id="update_roles" onsubmit="return confirm('Êtes-vous sur de vouloir sauvegarder les modifications ?')">
                                @csrf
                                @method('PATCH')
                                @foreach (\Spatie\Permission\Models\Permission::all() as $permission)
                                <tr>
                                    <td>{{$permission->name}}</td>
                                    @foreach (\Spatie\Permission\Models\Role::all() as $role)
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="permissions[{{$role->id}}][]" id="pm{{$role->id}}_{{$permission->id}}" value="{{$permission->name}}" @checked($role->hasPermissionTo($permission->name))>
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </form>
                        </tbody>
                    </table>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" onclick="$('#update_roles').submit()">Sauvegarder</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
