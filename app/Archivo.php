<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table='archivos';

    protected $fillable=['id', 'nombres', 'apellidos', 'url'];
}
