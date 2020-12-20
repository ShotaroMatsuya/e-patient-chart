<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = [];
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
