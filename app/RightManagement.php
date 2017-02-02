<?php

/**
 * @author Thibault Romanin
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;
use App\Role;
use App\User;
use App\Permission;

class RightManagement extends Model
{
    /**
     * Renvoie vrai ou faux, selon si l’utilisateur d’id $user_id est autorisé à faire $permission_name
     * @param $user_id
     * @param $permission_name
     * @return bool
     */
    public static function can($user_id, $permission_name) {

        $user = User::join('role_user', 'users.id', '=', 'role_user.user_id')
		    ->join('permission_role', 'role_user.role_id', '=', 'permission_role.role_id')
		    ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
		    ->where('users.id', '=', $user_id)
		    ->where('permissions.name', '=', $permission_name)
		    ->get();

		return $user->count()>0;
    }

    /**
     * Renvoie vrai ou faux, selon si l’utilisateur connecté est autorisé à faire $permission_name
     * @param $permission_name
     * @return bool
     */
    public static function authCan($permission_name) {
        return self::can(Auth::user()->id,$permission_name);
    }
    
    /**
     * Renvoie vrai ou faux, selon si l’utilisateur d’id $user_id possède le rôle $role_name, c'est la fonction is() que j'ai renommé parce que is() marchait pas
     * @param $user_id
     * @param $role_name
     * @return mixed
     */
    static function est($user_id, $role_name) {
        return User::whereId($user_id)->first()->roles->contains('name', $role_name);
    }

    /**
     * Renvoie vrai ou faux, selon si l’utilisateur connecté possède le rôle $role_name
     * @param $role_name
     * @return mixed
     */
    public static function authIs($role_name) {
        return self::est(Auth::user()->id,$role_name);
    }

    /**
     * Renvoie vrai si l’utilisateur d’id $user_id est autorisé à faire au moins l’une des $permissions_names, sinon renvoie faux
     * @param $user_id
     * @param $permissions_names
     * @return bool
     */
    public static function canAtLeast($user_id, $permissions_names) {
        $user = User::join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('permission_role', 'role_user.role_id', '=', 'permission_role.role_id')
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->where('users.id', '=', $user_id)
            ->whereIn('permissions.name', '=', $permissions_names)
            ->get();

        return $user->count()>0;
    }

    /**
     * Renvoie vrai si l’utilisateur connecté est autorisé à faire au moins l’une des $permissions_names, sinon renvoie faux
     * @param $permissions_names
     * @return bool
     */
    public static function authCanAtLeast($permissions_names) {
        $user = User::join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('permission_role', 'role_user.role_id', '=', 'permission_role.role_id')
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->where('users.id', '=', Auth::user()->id)
            ->whereIn('permissions.name', '=', $permissions_names)
            ->get();

        return $user->count()>0;
    }

    /**
     * Renvoie vrai si l’utilisateur d’id $user_id est autorisé à faire toutes les $permissions_names, sinon renvoie faux
     * @param $user_id
     * @param $permissions_names
     * @return bool
     */
    public static function canAll($user_id, $permissions_names) {
        $canAll = false;
        foreach($permissions_names as $permission) {
            if(!(self::can($user_id, $permission))) {
                $canAll = false;
            }
        }
        return $canAll;
    }

    /**
     * Renvoie vrai si l’utilisateur connecté est autorisé à faire toutes les $permissions_names, sinon renvoie faux
     * @param $permissions_names
     * @return bool
     */
    public static function authCanAll($permissions_names) {
        $authCanAll = false;
        foreach($permissions_names as $permission) {
            if(!(self::authCan($permission))) {
                $authCanAll = false;
            }
        }
        return $authCanAll;
    }
}
