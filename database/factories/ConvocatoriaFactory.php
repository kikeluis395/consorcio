<?php

namespace Database\Factories;

use App\Models\Convocatoria;
use App\Models\Region;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConvocatoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Convocatoria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $description = $this->faker->company();
        return [
            'titulo' => $description,
            'cantidad' => $this->faker->randomDigit(),
            'email' => $this->faker->email(),
            'estado' => $this->faker->randomElement(['Cerrado', 'Abierto', 'En proceso']),
            'adjudicado' => $this->faker->company(),
            'fecha_inicio' => $this->faker->date(),
            'fecha_bases' => $this->faker->date(),
            'fecha_consulta' => $this->faker->date(),
            'fecha_propuestas' => $this->faker->date(),
            'fecha_fin' => $this->faker->date(),
            'alcance' => $this->faker->text($maxNbChars = 200),
            'tdr_url' => $this->faker->url(),
            'proceso_url' => $this->faker->url(),
            'resultado_url' => $this->faker->url(),
            'slug' => Str::slug($description),
            'region_id' => Region::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
