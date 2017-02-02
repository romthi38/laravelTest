<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\RightManagement;
use App\User;
use App\Permission;
use App\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    
    public function getHome() {
        /*$user = Auth::user();
        
        if(!$user->is_admin) abort(403);*/

        $users = User::get();
        $permissions = Permission::get();
        $roles = Role::get();

        $data = [];

        foreach ($users as $user) {
            // Test de la fonction can()
            foreach ($permissions as $permission) {
                $data['peut'][] = array('user' => $user->name,
                    'permission' => $permission->name,
                    'can' => RightManagement::can($user->id, $permission->name));
            }
            // Test de la fonction est()
            foreach ($roles as $role) {
                $data['est'][] = array('user' => $user->name,
                    'role' => $role->name,
                    'is' => RightManagement::est($user->id, $role->name));
            }
        }

        if(!(RightManagement::authIs('super admin'))) abort(403);

        return view('admin.pages.home',$data);
    }
}
