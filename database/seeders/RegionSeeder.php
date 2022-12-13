<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create([
            'nombre' => 'Tumbes',
            'paquete_id' => 1
        ]);
        Region::create([
            'nombre' => 'Zarumilla',
            'paquete_id' => 1
        ]);
        Region::create([
            'nombre' => 'Ancash Costa',
            'paquete_id' => 2
        ]);
        Region::create([
            'nombre' => 'Ancash Sierra',
            'paquete_id' => 2
        ]);
        Region::create([
            'nombre' => 'Cajamarca',
            'paquete_id' => 2
        ]);
        Region::create([
            'nombre' => 'La Libertad',
            'paquete_id' => 2
        ]);
    }
}
