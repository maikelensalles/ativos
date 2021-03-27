<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'banco', 'agencia', 'conta_corrente', 'digito', 'nascimento', 'genero', 'cpf', 'rg', 'orgao', 'estado_civil', 'telefone', 'cep', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'empresa', 'profissao', 'cargo', 'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user() {
        return $this->hasMany('App\ContratoUser');
    }

    public function contratouser() {
        return $this->hasMany('App\ContratoUserSaque');
    }

    public function novidade() {
        return $this->hasMany('App\Novidades');
    }

    public function usersaldo() {
        return $this->hasMany('App\UserSaldo');
    }
}
