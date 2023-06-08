<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function roles(){
        $role = Role::create(['name' => 'test']);
        $permission = Permission::create(['name' => 'permiso']);
        $role->givePermissionTo('permiso');
        
        

        $user = User::find(1);
        $user->assignRole('test');
        dd($user->can('permiso'));


    
    }
    
}
