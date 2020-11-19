<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';

    protected $fillable = ['image', 'participacao', 'titulo', 'sub_titulo', 'descricao', 'descricao_longa', 'rentabilidade_alvo', 'contrato_setor_id', 'body_3', 'body', 'body_2', 'valor_captado', 'valor_cota', 'status'];

    public function setor()
    {
        return $this->belongsTo('App\ContratoSetor', 'contrato_setor_id')->withTrashed();
    }
}