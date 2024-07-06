<?php

namespace App\Http\Requests;

use App\Models\GuiaDevolucion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\UniqueRuleInterface;
class GuiaDevolucionRequest extends FormRequest
{
    public function __construct(UniqueRuleInterface $uniqueRuleService)
    {
        $this->uniqueRuleService = $uniqueRuleService;
        $this->model=GuiaDevolucion::class;
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
            'fecha' => 'nullable|date_format:Y-m-d',
            'estado_pieza_id' => 'nullable|numeric',
        ];
    }
}
