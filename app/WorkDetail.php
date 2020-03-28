<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkDetail extends Model
{
    protected $table = 'work_details';

    public function tbwork_detail(){
        return $this->belongsTo(Work::class, 'work_id');
    }

    public $timestamps = false;
}
