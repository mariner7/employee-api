<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Documents>
 */
class DocumentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $extension = $this->faker->randomElement(['pdf', 'jpeg']);
        $type = $extension == 'pdf' ? 'pdf' : 'jpeg';
        return [
            'user_id' => 2,
            'filename' => $this->faker->text(10),
            'extension' => $extension,
            'type' => $type
        ];
    }
}
