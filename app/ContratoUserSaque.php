<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContratoUserSaque extends Model
{
    protected $table = 'contrato_users_saques';
    protected $fillable = ['solicitacao', 'contrato_id', 'user_id'];
    
    public function contratouser()
    {
        return $this->belongsTo('App\ContratoUser', 'contrato_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}