<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class autor extends Model
{
    use HasFactory;
    protected $table = 'autor';
    protected $fillabel = ['nombre','nacionalidad'];


    public function libro(){
        return $this->belognsTo(libro::class,'autor_id');
    }
}
