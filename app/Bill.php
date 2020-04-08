<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    public function tbbill_1(){
        return $this->belongsTo(Work::class, 'work_id');
    }

    public function tbbill_2(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public $timestamps = false;
}
