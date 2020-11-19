<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContratoSetor extends Model
{
    use SoftDeletes;
    protected $table = 'contrato_setors';
    protected $fillable = ['nome'];
    public function contratos() {
        return $this->hasMany('App\Contrato');
    }
}