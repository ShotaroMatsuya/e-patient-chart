<?php

namespace App\Http\Controllers;

use App\Post;
use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //
    public function index()
    {
        $posts = auth()->user()->posts;
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.index')->with('roles', $roles)->with('permissions', $permissions)->with('posts', $posts);
    }
}
