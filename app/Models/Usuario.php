<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ModelMain;
class Usuario extends ModelMain
{
    use HasFactory;
    protected $table = 'users';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'users_id',
        'status',
    ];

    protected $hidden = ['created_at','updated_at','users_id','status','password','remember_token','email_verified_at'];
  
}
