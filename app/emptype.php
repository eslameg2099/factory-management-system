<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emptype extends Model
{
    protected $guarded = [];

    


    public function shafts()
    {
        return $this->hasMany(shaft::class);

    }//end 
    //
}
