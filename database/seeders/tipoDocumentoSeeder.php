<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['descripcion'=>'DNI','status'=>1],
            ['descripcion'=>'RUC','status'=>1],
            ['descripcion'=>'CARNET DE EXTRANJERIA','status'=>1]
        ];
        
        \App\Models\TipoDocumento::insert($data);
    }
}
