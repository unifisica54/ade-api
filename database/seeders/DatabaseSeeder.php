<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            $this->call(UsersSeeder::class);
            $this->call(DepartamentoSeeder::class);
            $this->call(DistritoSeeder::class);
            $this->call(ProvinciaSeeder::class);
            $this->call(tipoDocumentoSeeder::class);
            $this->call(parametro::class);
    }
}
