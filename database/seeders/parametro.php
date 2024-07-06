<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class parametro extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'tipo' => 1,
                'secuencia' => 1,
                'descripcion' => 'En proceso',
                'users_id' => 1,
                'status' => 1,
            ],
            [
                'tipo' => 1,
                'secuencia' => 2,
                'descripcion' => 'Cerrado',
                'users_id' => 1,
                'status' => 1,
            ],
            [
                'tipo' => 1,
                'secuencia' => 3,
                'descripcion' => 'Reprogramado',
                'users_id' => 1,
                'status' => 1,
            ]
        ];
        
        \App\Models\Parametro::insert($data);
    }
}
