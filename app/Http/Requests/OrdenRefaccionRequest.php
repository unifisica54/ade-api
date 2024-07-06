<?php
namespace App\Http\Requests;

use App\Interfaces\UniqueRuleInterface;
use App\Models\OrdenRefaccion;
use App\Rules\UniqueRule;
use Illuminate\Foundation\Http\FormRequest;

class OrdenRefaccionRequest extends FormRequest
{
    protected $uniqueRuleService;
    protected $model;
    public function __construct(UniqueRuleInterface $uniqueRuleService)
    {
        $this->uniqueRuleService = $uniqueRuleService;
        $this->model=OrdenRefaccion::class;
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
            'refaccion_id' => 'nullable|numeric',
            'numero_orden_id' => 'nullable', 'numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'refaccion_id.numeric' => 'El campo refaccion_id debe ser un número.',
            'numero_orden_id.numeric' => 'El campo numero_orden_id debe ser un número.',
        ];
    }
}
