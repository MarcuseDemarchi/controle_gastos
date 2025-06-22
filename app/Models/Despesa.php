<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $table = 'tbdespesas';
    protected $primaryKey = 'descodigo';

    protected $fillable = [
        'desdescricao',
        'desvalor',
        'desdata',
        'catcodigo',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'catcodigo', 'catcodigo');
    }
}
