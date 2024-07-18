<?php

namespace App\Http\Requests;

use App\Models\NumeroOrden;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\UniqueRuleInterface;

class NumeroOrdenRequest extends FormRequest
{
    public function __construct(UniqueRuleInterface $uniqueRuleService)
    {
        $this->uniqueRuleService = $uniqueRuleService;
        $this->model=NumeroOrden::class;
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
            'casos_id' => 'nullable|numeric',
            'guia_devolucion_id' => 'nullable|numeric',
        ];
    }
}
