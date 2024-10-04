<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function show_users(){
        $users = User::all();
        foreach($users as $user){
           $service = Service::find($user->id_service);
           $user->service = $service->service;
        }
        return view('admin.users', ['users' => $users]);
    }
    public function show_services(){
        $services = Service::all();
        return view('admin.services', ['services' => $services]);
    }

    public function add_user(){
        $services = Service::all();
        return view('admin.add_user', ['services' => $services]);
    }
    public function add_service(){
        return view('admin.add_service');
    }
    public function add_servicedb(Request $request){
        $request->validate([
            'service'=>['required']
        ]);
        Service::create([
            'service' => $request->service,
        ]);
        $services = Service::all();
        return to_route('services')->with('success', 'Service ajouté avec succès');
    }
    public function add_userdb(Request $request): RedirectResponse{
            $request->validate([
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'id_service' => ($request->service == 'admin')?'1':$request->service,
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            return to_route('users')->with('success', 'Utilisateur ajouté avec succès.');

    }
    public function select_user(){
        $users = User::all();
        return view('admin.select_user',  ['users' => $users]);
    }
    // public function show_user($id){
    //     $user = User::find($id);
    //     $services = Service::all();
    //     return view('admin.show_user', ['user' => $user, 'services'=>$services]);
    // }

    public function update_user($id){
        $user = User::find($id);
        $services = Service::all();
        return view('admin.update_user', ['user' => $user, 'services'=>$services]);
    }

    public function update_service(Request $request){
        $service = Service::find($request->id);
        return view('admin.update_service', ['service'=>$service]);
    }

    public function update_servicedb(Request $request){
        $request->validate([
            'service'=>['required']
        ]);

        Service::find($request->id)->update(['service'=>$request->service]);
        $services = Service::all();
        return to_route('services')->with('success', 'Service mis à jour avec succès');
    }


    public function update_userdb(Request $request,$id){
        /* $validate = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
            'service' => ['required']
        ]); */
        //dd($validate);

        $user = User::find($id)->update([
            'id_service' => $request->service,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'role' => $request->role,
        ]);;
        return to_route('users')->with('success', 'Utilisateur mis à jour avec succès.');
    }


    public function delete_user(Request $request){
        $user = User::findOrFail($request->id)->delete();
        return to_route('users')->with('success', 'Utilisateur supprimé avec succès');
    }

    public function delete_service(Request $request){
        $servie = Service::findOrFail($request->id)->delete();
        return to_route('services')->with('success', 'Service supprimé avec succès');
    }

    public function store_role(Request $request){

        $request->validate([
            'role' => 'required',
        ]);
        $role = Role::create([
            'name' => $request->role,
        ]);
        return to_route('roles')->with('success', 'Role ajouté avec succès');
    }

    public function delete_role($id) {
        if(User::with('roles')->get()->filter(
            fn ($user) => $user->roles->where('id',$id)->toArray()
        )->count()!==0) return to_route('roles')->with('error', 'Vous ne pouvez pas supprimer ce role. Il est assigné à des utilisateurs.');
        $role = Role::find($id)->delete();
        return to_route('roles')->with('success', 'Role supprimé avec succès');
    }

    public function update_roles(Request $request){
        foreach ($request->permissions as $role => $permissions) {
            $role = Role::find($role)->syncPermissions($permissions);
        }
        foreach(Role::whereNotIn('id', array_keys($request->permissions))->get() as $role){
            $role->syncPermissions();
        }
        return to_route('roles')->with('success', 'Permissions mises à jour avec succès');
    }
}
