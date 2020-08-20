<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shaft extends Model
{
    protected $guarded = [];

    public function materials()
    {
        return $this->belongsToMany(material::class,'material_shaft')->withPivot('quantity');

    }

    public function employe()
    {
        return $this->belongsTo(employe::class);

    }//
    //
}


