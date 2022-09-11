<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $dates = ['executed_at'];
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}