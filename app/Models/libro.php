<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    use HasFactory;
    protected $table ='libro';//nombre de la tabla de la base de datos
    protected $fillable = ['titulo','autor','numero_paginas','precio','estado','autor_id'];

    public function autores(){
        return $this->hasMany('App\Models\autor','autor_id');
    }
}
