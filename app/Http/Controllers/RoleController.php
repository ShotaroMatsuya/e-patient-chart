<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);
    }
    public function store()
    {
        request()->validate([
            'name' => ['required']
        ]);
        Role::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-') //separaterをセット
        ]);
        // dd(request('name'));
        return back();
    }
    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('role-deleted', 'Deleted Role ' . $role->name);
        return back();
    }
}
