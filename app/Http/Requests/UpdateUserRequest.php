<?php

namespace App\Http\Requests;

use App\Rules\RightCpf;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  =>  ['required','string'],
            'password'              =>  ['confirmed'],
            'email'                 =>  ['required','email', "unique:users,email,{$this->id}"],
            'occupation'            =>  ['required','string'],
            'cpf'                   =>  ["required","unique:users,cpf,{$this->id}",new RightCpf],
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nome',
            'email' => 'email',
            'occupation' => 'função',
            'cpf' => 'CPF'
        ];
    }

    public function messages()
    {
        return [
            'password.confirmed' => 'O campo de confirmar senha está diferente do campo de :attribute.',
        ];
    }
}
