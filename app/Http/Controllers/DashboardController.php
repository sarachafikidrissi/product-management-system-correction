<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    //

    public function adminDash(){
        
        $users = User::where('id', '!=', 1)->get();
        $roles = Role::all();
        return view('admin-dashboard', compact('users', 'roles'));

    }

    public function assignRole(Request $request, $user){

        
        //*find the user

        $findUser = User::find($user);

        //*find role
        $findRole = Role::find($request->assignRole);

        //* replace the old role with new role

        //^ syntax ======> $user->syncRoles('rolename');

        $findUser->syncRoles($findRole->name);

        return back();
    }
}
