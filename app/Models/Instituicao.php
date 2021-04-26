<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Instituicao extends Model
{
    use HasFactory;
    protected $table = 'instituicoes';

    protected $fillable = [
        'nome',
        'cnpj',
        'descricao',
        'responsavel',
        'total_arrecadado'
    ];

    public function doacoes(){
        return $this->hasMany(Doacao::class,'instituicao','id');
    }
}
