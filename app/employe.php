<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(emptype::class);

    }  

    public function salarys()
    {
        return $this->hasMany(salary::class);

    }//e

    public function shafts()
    {
        return $this->hasMany(shaft::class);

    }//end
    //
}
