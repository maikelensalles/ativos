<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContratoUser extends Model
{
    protected $table = 'contrato_users';
    protected $fillable = ['valor', 'saque', 'status', 'contrato_id', 'user_id'];
    
    public function contrato()
    {
        return $this->belongsTo('App\Contrato', 'contrato_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function contratouser() {
        return $this->hasMany('App\ContratoUserSaque');
    }
}