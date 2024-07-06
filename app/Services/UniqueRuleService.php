<?php

namespace App\Services;

use App\Interfaces\UniqueRuleInterface;
use Illuminate\Database\Eloquent\Model;
use App\Rules\UniqueRule;
class UniqueRuleService implements UniqueRuleInterface
{
    public function Edit($id, $modelClass){
        if($id>0){
            return $modelClass::where('id', $id)->where('status', 1)->first();
        }
        return false;
    }
    public function UniqueRule($object,$name,$value,$modelClass,$rules)
    {
        if (!$object||($object && $object[$name] != $value[$name])) {
            $rules[] = new UniqueRule($modelClass);
        }
        return $rules;
    }
}