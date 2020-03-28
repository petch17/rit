<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table = 'works';

    public function tbwork_details(){
        return $this->hasMany(Work::class);
    }

    public function tbwork(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public $timestamps = false;
}
