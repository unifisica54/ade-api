<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;
class UniqueRule implements ValidationRule
{
    private $modelClass;

    /**
     * Create a new rule instance.
     *
     * @param string $modelClass
     */
    public function __construct(string $modelClass)
    {
        $this->modelClass = $modelClass;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(is_numeric($value)){
            if ($this->modelClass::where($attribute, $value)->where('status', 1)->exists()) {
                $fail('El '.$attribute.' debe ser único.');
            }
        }else{
            if ($this->modelClass::where(DB::raw('UPPER('.trim($attribute).')'), trim(strtoupper($value)))->where('status', 1)->exists()) {
                $fail('El '.$attribute.' debe ser único.');
            }
        }
       
    }
}
