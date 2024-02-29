<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tarea extends Model
{
    use HasFactory;

    //protected $guarded = [];

    protected $fillable = ["titulo", "descripcion"];

    protected $hidden = ["created_at", "updated_at"];

    // protected $table = "nuevonombretabla";

    public function etiqueta(): BelongsToMany {
        return $this->belongsToMany(Etiqueta::class, 'tarea_etiqueta', 'tarea_id', 'etiqueta_id');
    }
}
