<?php

namespace App\Http\Requests;

use App\User;
use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class BancarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();    
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'banco' => ['required'],
            'agencia' => ['required'],
            'conta_corrente' => ['required'],
        ];
    }
}