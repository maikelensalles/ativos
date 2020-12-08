<?php

namespace App\Http\Requests;

use App\User;
use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class CadastroRequest extends FormRequest
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
            'image' => ['required'],
            'nascimento' => ['required'],
            'genero' => ['required'],
            'cpf' => ['required'],
            'rg' => ['required'],
            'orgao' => ['required'],
            'estado_civil' => ['required'],
            'telefone' => ['required'],
            'cep' => ['required'],
            'endereco' => ['required'],
            'numero' => ['required'],
            'complemento' => ['required'],
            'bairro' => ['required'],
            'cidade' => ['required'],
            'estado' => ['required'],
            'empresa' => ['required'],
            'profissao' => ['required'],
            'cargo' => ['required'],
        ];
    }
}