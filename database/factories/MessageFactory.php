<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => '2',
            'chat_id' => '1',
            'message' =>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis reprehenderit suscipit sint laboriosam dicta eaque eum, quod harum aliquam, placeat ratione et aliquid. Ut amet hic facere perferendis, vitae incidunt.',
        ];
    }
}
