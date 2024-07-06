<?php

namespace App\Http\Requests;

use App\Models\Refaccion;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\UniqueRuleInterface;
class RefaccionRequest extends FormRequest
{
    public function __construct(UniqueRuleInterface $uniqueRuleService)
    {
        $this->uniqueRuleService = $uniqueRuleService;
        $this->model=Refaccion::class;
    }

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
        $object=$this->uniqueRuleService->Edit($this->id,$this->model);
        return [
            'numero_parte' => $this->uniqueRuleService->UniqueRule($object,'numero_parte',$this,$this->model,['required', 'string']),
            'descripcion' => 'required|string',
        ];
    }
}
