<?php

namespace Database\Seeders;

use App\Models\Paquete;
use Illuminate\Database\Seeder;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Paquete::create([
            'nombre' => 'Paquete 5'
        ]);
        Paquete::create([
            'nombre' => 'Paquete 6'
        ]);
    }
}
