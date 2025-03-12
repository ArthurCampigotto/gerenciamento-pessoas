<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlocacaoPessoa extends Model
{
    protected $table = 'alocao_pessoas';
    use HasFactory;

    protected $fillable = ['pessoa_id', 'sala_id', 'sala_cafe_id', 'etapa_id'];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function salaCafe()
    {
        return $this->belongsTo(SalaCafe::class);
    }

    public function etapa()
    {
        return $this->belongsTo(Etapa::class);
    }
}

