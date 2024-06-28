<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidOperation;

class OperationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            ['required',new ValidOperation],
            'operatorA' => 'required|integer',
            'operatorB' => 'required|integer'
        ];
    }

    public function messages()
    {
        return[
            'operation.required' => 'La operación es obligatoria',
            'operatorA.required' => 'El primero operador es obligatorio',
            'operatorB.required' => 'El segundo operador es obligatorio',
            'operatorA.integer' => 'El primero operador debe ser un número',
            'operatorB.integer' => 'El segundo operador debe ser un número',
        ];
    }
}
