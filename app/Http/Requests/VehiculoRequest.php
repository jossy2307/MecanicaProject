<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoRequest extends FormRequest
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
			'placa' => 'required|string',
			'color' => 'required|string',
			'marca' => 'required|string',
			'modelo' => 'required|string',
			'anio' => 'required',
			'kilometraje' => 'required',
			'cliente_id' => 'required',
        ];
    }
}
