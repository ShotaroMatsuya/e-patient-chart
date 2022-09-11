<?php

namespace App;

use App\Post;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'avatar', 'email', 'password', 'major'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //password mutatorの作成(passwordをdbに保存する際に必ず呼び出される関数：命名に規則がある)
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value); //バリデーション後のpasswordがここでhash化される
    }
    //avatarのaccessorの作成(dbからavatarのpathを取得して整形してoutput)
    public function getAvatarAttribute($value)
    {
        if (strpos($value, 'https://') !== false || strpos($value, 'http://') !== false) {
            return $value;
        }

        return asset('storage/' . $value);
    }


    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function userHasRole($role_name)
    {
        foreach ($this->roles as $role) {
            //入力値を小文字に変換して文字列を比較
            if (Str::lower($role_name) == Str::lower($role->name)) {
                return true;
            }
        }
        return false;
    }
    public function isAdmin()
    {
        foreach ($this->roles as $role) {
            if ($role->name == 'Admin') {
                return true;
            }
        }
    }
    public function isDoctor()
    {
        foreach ($this->roles as $role) {
            if ($role->name == 'Doctor') {
                return true;
            }
        }
    }
    public function isTester()
    {
        if ($this->major == '病理部' || $this->major == '放射線科' || $this->major == '内視鏡科' || $this->isAdmin()) {
            return true;
        }
    }
    public function userHasPermission($permission_name)
    {
        foreach ($this->permissions as $permission) {
            //入力値を小文字に変換して文字列を比較
            if (Str::lower($permission_name) == Str::lower($permission->name)) {
                return true;
            }
        }
        return false;
    }
    public function result()
    {
        return $this->belongsTo(Result::class);
    }
}