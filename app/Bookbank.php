<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookbank extends Model
{
    protected $table = 'bookbank';
    public function tbbill_1(){
        return $this->belongsTo(Work::class, 'work_id');
    }

    public function tbbill_2(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public $timestamps = false;
}
