<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', ['users' => $users]);
    }
    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user,
            'roles' => Role::all(),

        ]);
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store()
    {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'major' => ['string', 'nullable'],
            'password' => ['min:6', 'max:255', 'confirmed'] //2つのfiledが一致しているかを確認する
        ]);
        $role_id = request()->validate([
            'role_id' => ['numeric', 'required']
        ]);
        if ($role_id !== 2) {
            $inputs['major'] = null;
        }

        $user = User::create($inputs);
        $user->roles()->attach($role_id['role_id']);

        $permissions = [];
        foreach ($user->roles as $role) {
            foreach ($role->permissions->pluck('id')->all() as $permission_id) {
                if (!in_array($permission_id, $permissions)) {
                    array_push($permissions, $permission_id);
                } else {
                    continue;
                }
            }
        }
        $user->permissions()->sync($permissions);
        session()->flash('success', 'User has been created successfully.' . $user->name);
        return back();
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['min:6', 'max:255', 'confirmed'] //2つのfiledが一致しているかを確認する
        ]);
        // if (request('avatar')) {
        //     // dd(request('avatar'));
        //     $inputs['avatar'] = request('avatar')->store('images');
        // }
        $user->update($inputs);
        session()->flash('success', 'User has been updated successfully.');
        return back();
    }
    public function attach(User $user)
    {
        // dd($user); //Userモデルのインスタンスを取得
        // dd(request('role')); //フォームから入力された値を取
        $user->roles()->attach(request('role'));

        $permissions = [];
        foreach ($user->roles as $role) {
            foreach ($role->permissions->pluck('id')->all() as $permission_id) {

                if (!in_array($permission_id, $permissions)) {

                    array_push($permissions, $permission_id);
                } else {
                    continue;
                }
            }
        }
        //pluckメソッドはcollectionから指定したカラムを配列で取得
        $user->permissions()->sync($permissions);
        session()->flash('success', 'User has been attached successfully.');
        return back();
    }
    public function detach(User $user)
    {
        $user->roles()->detach(request('role'));
        $permissions = [];
        foreach ($user->roles as $role) {
            foreach ($role->permissions->pluck('id')->all() as $permission_id) {
                if (!in_array($permission_id, $permissions)) {

                    array_push($permissions, $permission_id);
                } else {
                    continue;
                }
            }
        }
        $user->permissions()->sync($permissions);

        session()->flash('success', 'User has been detached successfully.');
        return back();
    }
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', 'User has been deleted successfully.');
        return back();
    }
}
