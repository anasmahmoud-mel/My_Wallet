<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'file',
        'desctiption',
      


    ];
    // public function user()
    // {
    //    // return $this->belongsTo('App\User' , 'user_id');
    //     return $this->belongsTo('App\User', 'user_id');
    // }
}
