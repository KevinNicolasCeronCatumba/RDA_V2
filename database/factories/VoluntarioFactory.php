<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voluntario>
 */
class VoluntarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'tipoDoc'=> $this->faker->randomElement(['CC', 'TI', 'CE']),
            'numDoc'=> $this->faker->randomNumber(8, true),
            'correo'=> $this->faker->safeEmail(),
            'telefono'=> $this->faker->randomNumber(9, true)
        ];
    }
}
