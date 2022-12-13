<?php

namespace Database\Factories;

use App\Models\Convocatoria;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $descripcion = $this->faker->company();
        return [
            'nombre_empresa' => $descripcion,
            'razon_social' => $descripcion,
            'ruc' => $this->faker->isbn10(),
            'direccion' => $this->faker->address(),
            'pagina_web' => $this->faker->url(),
            'brochure_url' => $this->faker->url(),
            'contacto_nombre' => $this->faker->name(),
            'contacto_cargo' => $this->faker->jobTitle(),
            'contacto_telefono' => $this->faker->phoneNumber(),
            'contacto_correo' => $this->faker->email(),
            'anos_experiencia' => $this->faker->randomDigit(),
            'sustento_experiencia_url' => $this->faker->url(),
            'facturacion_2020_url' => $this->faker->url(),
            'reporte_central_url' => $this->faker->url(),
            'convocatorias_id' => Convocatoria::all()->random()->id,
        ];
    }
}
