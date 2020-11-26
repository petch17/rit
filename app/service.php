<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    //
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'service';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'service_name','price','unit','desc','pic'

    ];
}
