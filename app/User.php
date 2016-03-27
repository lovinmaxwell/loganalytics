<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
class User extends Authenticatable
{
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAllUsersWithRoles()
    {
        return $this->select(['users.id as id', 'users.name', 'users.email','roles.name as role','users.created_at','users.updated_at'])
            ->where('users.id', '!=', Auth()->user()->id)
            ->join('user_has_roles', 'user_has_roles.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'user_has_roles.role_id')->get();
    }

    public function getUserInfoWithRole($id)
    {
        return $this->select(['users.id as id', 'users.name', 'users.email','roles.name as role','users.created_at','users.updated_at'])
            ->where('users.id', $id)
            ->join('user_has_roles', 'user_has_roles.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'user_has_roles.role_id')->first();
    }

    public function getRole()
    {
        $currentRole = $this->select(['roles.name as role'])
            ->where('users.id', Auth()->user()->id)
            ->join('user_has_roles', 'user_has_roles.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'user_has_roles.role_id')->first();
        return $currentRole->role;
    }

    public function roleList()
    {
        $roleListArray = [];
        $roles = Role::select('id','name')->get();
        foreach($roles as $role)
        {
            $roleListArray[$role->name] = ucfirst($role->name);
        }
        return $roleListArray;
    }
}
