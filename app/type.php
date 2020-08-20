<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    protected $guarded = [];

    public function materials()
    {
        return $this->hasMany(material::class);

    }//end o
    //
}
