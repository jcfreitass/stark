<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [ 'name', 'data' , 'data_flux','roomRecords'];
    public $timestamps = false;
}
