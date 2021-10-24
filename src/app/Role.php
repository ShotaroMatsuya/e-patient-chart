<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];
    public function permissions()
    { //多対多
        return $this->belongsToMany(Permission::class);
    }
    public function users()
    { //多対多
        return $this->belongsToMany(User::class);
    }
}
