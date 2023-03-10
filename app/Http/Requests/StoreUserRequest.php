<?php

namespace App\Http\Requests;

use App\Rules\RightCpf;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'password'              =>  ['required','confirmed','min:8'],
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
            'password.confirmed' => 'O campo :attribute não confere com o campo de confirmar senha'
        ];
    }
}
