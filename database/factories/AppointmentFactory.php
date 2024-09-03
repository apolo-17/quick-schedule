<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_id' => Service::factory(), // Crear un servicio asociado
            'customer_id' => User::factory(), // Crear un cliente asociado
            'business_id' => Business::factory(), // Crear un negocio asociado
            'appointment_time' => $this->faker->dateTimeBetween('+1 week', '+1 month'), // Cita en el futuro
            'status' => $this->faker->randomElement(['scheduled', 'completed', 'cancelled']),
            'notes' => $this->faker->optional()->text(), // Notas opcionales
        ];
    }
}
