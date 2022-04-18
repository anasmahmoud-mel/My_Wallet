<?php
namespace App\Models;
namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable{

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'user_type',
        'address',
        'mobile',
        'img'

    ];
    public function setPasswordAttribute($value)
    {
       $this->attributes['password'] = bcrypt($value);
    }
    // public function products(){
    //     return $this->hasMany(Product::class);
    // }
}
