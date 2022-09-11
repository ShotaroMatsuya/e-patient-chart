<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $guarded = [];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function getUser($user_id)
    {
        $doctors = User::all()->whereNotNull('major');
        return $doctors->where('id', $user_id)->first();
    }
}