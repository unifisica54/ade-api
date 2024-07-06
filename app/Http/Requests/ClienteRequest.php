<?php

namespace App\Http\Requests;

use App\Models\Clientes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\UniqueRuleInterface;
class ClienteRequest extends FormRequest
{
    public function __construct(UniqueRuleInterface $uniqueRuleService)
    {
        $this->uniqueRuleService = $uniqueRuleService;
        $this->model=Clientes::class;
    }

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
        $object=$this->uniqueRuleService->Edit($this->id,$this->model);
        
        return [
            'ruc' => $this->uniqueRuleService->UniqueRule($object,'ruc',$this,$this->model,['nullable', 'string']),
            'razon_social' => $this->uniqueRuleService->UniqueRule($object,'razon_social',$this,$this->model,['required', 'string']),
            'telefono' => 'nullable|string',
            'correo' => 'nullable|string',
            'direccion' => 'nullable|string',
            'ubigeo_id' => 'nullable|string',
        ];
    }

}
