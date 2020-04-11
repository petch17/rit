<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    public function tbcustomer(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public $timestamps = false;
}
