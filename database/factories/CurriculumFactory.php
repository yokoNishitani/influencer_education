<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curriculum>
 */
class CurriculumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText( 20 ),
            'thumbnail' => $this->faker->realText( 50 ),
            'description' => $this->faker->realText( 100 ),
            'video_url' => $this->faker->realText( 50 ),
            'alway_delivery_flg' => $this->faker->boolean(), // true または false を生成
            'grade_id' => $this->faker->numberBetween( $min = 1, $max = 12 ),
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => null,
        ];
    }
}
