<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
class EmpleadoRequest extends FormRequest
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
            'nombres' => 'required|string',
            'apel_paterno' => 'required|string',
            'apel_materno' => 'required|string',
            'tipo_documento_id' => 'nullable|numeric',
            'numero_documento' => 'nullable|string',
            'telefono' => 'nullable|string',
            'correo' => 'nullable|string',
        ];
    }
}
