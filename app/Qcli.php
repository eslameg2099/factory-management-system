<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qcli extends Model
{
    protected $guarded = [];

    public function Conteners()
    {
        return $this->hasMany(Contener::class);

    }//en

    //
}
