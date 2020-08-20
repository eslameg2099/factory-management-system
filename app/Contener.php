<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contener extends Model
{    protected $guarded = [];


    public function Qclii()
    {
        return $this->belongsTo(Qcli::class);

    }
    //
}
