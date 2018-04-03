<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelkota extends Model
{
    protected $table="kota";
    protected $fillable=[
        'nama'
    ];
}
