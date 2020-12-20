<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = [];
    //$fillableはホワイトリスト,$guardedはブラックリスト
    protected $dates = [
        'birthday',
        'created_at',
        'updated_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    // mutatorかaccessorのどちらかを使えば良い
    //mutator ... databaseに保存する前にimageファイルのpathを整形する
    // public function setPostImageAttribute($value)
    // {
    //     $this->attributes['post_image'] = asset($value); //assetをかけてdbに保存
    // }

    //accessor ... imgタグ内でassetを使わずに直接アクセスできる
    public function getPostImageAttribute($value)
    {
        if (strpos($value, 'https://') !== false || strpos($value, 'http://') !== false) {
            return $value;
        }

        return asset('storage/' . $value);
    }
}
