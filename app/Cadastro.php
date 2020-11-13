<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $table = 'cadastros';    
    
    public $timestamps = false;

    protected $fillable = ['image', 'nascimento', 'genero', 'cpf', 'rg', 'orgao', 'estado_civil', 'telefone', 'cep', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'empresa', 'profissao', 'cargo'];

}