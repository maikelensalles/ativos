<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSaldo extends Model
{
    use SoftDeletes;
    protected $table = 'user_saldos';
    protected $fillable = ['saldo', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}