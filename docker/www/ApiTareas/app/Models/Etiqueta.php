<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    protected $fillable = [
        'nombre',
    ];
    
    protected $hidden = ['created_at', 'updated_at'];
   
    use HasFactory;
}
