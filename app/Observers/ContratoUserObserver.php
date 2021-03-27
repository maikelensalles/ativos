<?php namespace App\Observers;

use App\ContratoUser;

class ContratoUserObserver 
{
    public function creating(ContratoUser $model)
    {
        $model->user_id = auth()->user()->id;
    }   
}