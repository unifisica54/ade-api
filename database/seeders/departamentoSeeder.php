<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class departamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            ['ubigeo'=>'01','nombre'=>'Amazonas','status'=>1],
            ['ubigeo'=>'02','nombre'=>'Áncash','status'=>1],
            ['ubigeo'=>'03','nombre'=>'Apurímac','status'=>1],
            ['ubigeo'=>'04','nombre'=>'Arequipa','status'=>1],
            ['ubigeo'=>'05','nombre'=>'Ayacucho','status'=>1],
            ['ubigeo'=>'06','nombre'=>'Cajamarca','status'=>1],
            ['ubigeo'=>'07','nombre'=>'Callao','status'=>1],
            ['ubigeo'=>'08','nombre'=>'Cusco','status'=>1],
            ['ubigeo'=>'09','nombre'=>'Huancavelica','status'=>1],
            ['ubigeo'=>'10','nombre'=>'Huánuco','status'=>1],
            ['ubigeo'=>'11','nombre'=>'Ica','status'=>1],
            ['ubigeo'=>'12','nombre'=>'Junín','status'=>1],
            ['ubigeo'=>'13','nombre'=>'La Libertad','status'=>1],
            ['ubigeo'=>'14','nombre'=>'Lambayeque','status'=>1],
            ['ubigeo'=>'15','nombre'=>'Lima','status'=>1],
            ['ubigeo'=>'16','nombre'=>'Loreto','status'=>1],
            ['ubigeo'=>'17','nombre'=>'Madre de Dios','status'=>1],
            ['ubigeo'=>'18','nombre'=>'Moquegua','status'=>1],
            ['ubigeo'=>'19','nombre'=>'Pasco','status'=>1],
            ['ubigeo'=>'20','nombre'=>'Piura','status'=>1],
            ['ubigeo'=>'21','nombre'=>'Puno','status'=>1],
            ['ubigeo'=>'22','nombre'=>'San Martín','status'=>1],
            ['ubigeo'=>'23','nombre'=>'Tacna','status'=>1],
            ['ubigeo'=>'24','nombre'=>'Tumbes','status'=>1],
            ['ubigeo'=>'25','nombre'=>'Ucayali','status'=>1]
        ];
        
        \App\Models\Departamento::insert($data);
    }
}
