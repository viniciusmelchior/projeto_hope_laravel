<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Doacao extends Model
{
    use HasFactory;
    protected $table = 'doacoes';

    protected $fillable = [
        'doador',
        'instituicao',
        'valor'
    ];

    public function instituicoes(){
        return $this->belongsTo(Instituicao::class,'instituicao','id');
    }
}
