<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(type::class);

    }

    public function shafts()
    {
        return $this->belongsToMany(shaft::class,'material_shaft');

    }
    //
}
