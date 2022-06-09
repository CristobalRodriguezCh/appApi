<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class biblioteca extends Model
{
    use HasFactory;
    protected $table = 'bibliotecas';
    protected $fillable = ['nombre','direccion'];


    //relacion a muchos a muchos con libro
    public function libro(){
        return $this->belongsToMany('App\Models\libro');
    }
}
