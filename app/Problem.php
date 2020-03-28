<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $table = 'problems';

    public function tbproblem(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public $timestamps = false;
}
