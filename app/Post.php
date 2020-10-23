<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];
    //$fillableはホワイトリスト,$guardedはブラックリスト
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
