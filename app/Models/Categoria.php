<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'tbcategorias';

    public function despesas()
    {
        return $this->hasMany(Despesa::class);
    }
}
