<?php 
namespace App\Interfaces;
 
 
interface  UniqueRuleInterface  {
    public function Edit($id,$modelClass);
    public function UniqueRule($object,$name,$value,$modelClass,$rules);
}
