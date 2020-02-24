<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    protected $fillable = [ 'id' , 'name_user' , 'cpf' , 'room', 'email' , 'status'];
    public $timestamps = false;
}
