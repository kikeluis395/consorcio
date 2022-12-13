<?php

namespace Database\Seeders;

use App\Models\Convocatoria;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaqueteSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(RoleSeeder::class);
        // User::factory(10)->create();
        User::create([
            'name' => 'Jose Cayo - Reactive',
            'email' => 'jose@reactive.pe',
            'password' => bcrypt('12345678'),
            'region_id' => 1
        ])->assignRole('Admin');
        // Convocatoria::factory(20)->create();
        // Empresa::factory(20)->create();
    }
}
