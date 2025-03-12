<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaCafe extends Model
{
    use HasFactory;

    protected $table = 'salas_cafe';
    protected $fillable = ['nome', 'lotacao_maxima'];

    public function alocacoes()
    {
        return $this->hasMany(AlocacaoPessoa::class);
    }
}
