<?php

namespace App\Http\Requests;

use App\Models\Casos;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\UniqueRuleInterface;
class CasosRequest extends FormRequest
{
    public function __construct(UniqueRuleInterface $uniqueRuleService)
    {
        $this->uniqueRuleService = $uniqueRuleService;
        $this->model=Casos::class;
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
            'numero' => $this->uniqueRuleService->UniqueRule($object,'numero',$this,$this->model,['required', 'string']),
            'tarea' => 'nullable|string',
            'fecha' => 'nullable|string|date_format:Y-m-d',
            'hora' => 'nullable|string',
            'acciones_id' => 'required|numeric',
            'equipos_id' => 'required|numeric',
            'clientes_id' => 'required|numeric',
            'estado_id'=>'nullable|numeric',
            'precio_movilidad_ida' => 'nullable|string',
            'precio_movilidad_vuelta' => 'nullable|string',
        ];
    }
}
