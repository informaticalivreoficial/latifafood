<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatProduto extends Model
{
    use HasFactory;

    protected $table = 'cat_produtos';

    protected $fillable = [
        'uuid', 
        'status', 
        'titulo', 
        'descricao', 
        'slug'               
    ];

    /**
     * Scopes
    */
    public function scopeAvailable($query)
    {
        return $query->where('status', 1);
    }

    public function scopeUnavailable($query)
    {
        return $query->where('status', 0);
    }

    /**
     * Relacionamentos
    */

    /**
     * Accerssors and Mutators
    */
}
