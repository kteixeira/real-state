<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequestCreate extends FormRequest
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
            'real_states_id' => 'required|numeric|exists:real_states,id',
            'type' => 'required|boolean',
            'description' => 'required|string',
            'address' => 'required|string|max:200'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'type' => 'O campo type é obrigatório.',
            'description' => 'O campo description é obrigatório.',
            'address' => 'O campo address é obrigatório.'
        ];
    }
}
