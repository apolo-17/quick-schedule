<?php

namespace Database\Factories;

use App\Models\Business;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessHour>
 */
class BusinessHourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Array de días de la semana
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        // Generar un día de la semana aleatorio
        $dayOfWeek = $this->faker->unique()->randomElement($daysOfWeek);

        // Generar horas de apertura y cierre
        $openTime = $this->faker->time('H:i');
        $closeTime = $this->faker->time('H:i', '23:59');

        return [
            'business_id' => Business::factory(), // Crear un negocio asociado
            'day_of_week' => $dayOfWeek,
            'open_time' => $openTime,
            'close_time' => $closeTime,
            'is_closed' => $this->faker->boolean(10), // Probabilidad de que el negocio esté cerrado (10%)
        ];
    }
}
