<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modelkecamatan extends Model
{
    protected $table="kecamatan";
    protected $fillable=[
      'nama'
    ];
}
