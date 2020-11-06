<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function index()
    {
        return view('admin.permissions.index', [
            'permissions' => Permission::all()
        ]);
    }
    public function store()
    {
        request()->validate([
            'name' => ['required']
        ]);
        Permission::create([
            'name' => Str::ucfirst(request('name')),
            'slug' => Str::of(Str::lower(request('name')))->slug('-') //separatorをセット
        ]);
        // dd(request('name'));
        return back();
    }
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', ['permission' => $permission]);
    }
    public function update(Permission $permission)
    {
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(request('name'))->slug('-'); //slugメソッドの引数にはseparatorをセット
        if ($permission->isDirty('name')) { //nameが変更された場合

            session()->flash('permission-updated', 'Permission Updated: ' . $permission->name);
            $permission->save();
        } else { //nameが変更されなかった場合
            session()->flash('permission-updated', 'Nothing has been updated. ');
        }
        return back();
    }
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back();
    }
}
