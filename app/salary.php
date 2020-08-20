<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salary extends Model
{
    protected $guarded = [];

    public function employe()
    {
        return $this->belongsTo(employe::class);

    }  
    //
}
