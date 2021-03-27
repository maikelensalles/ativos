<?php namespace App\Observers;

use App\ContratoUserSaque;

class ContratoUserSaqueObserver 
{
    public function creating(ContratoUserSaque $model)
    {
        $model->user_id = auth()->user()->id;
    }   
}