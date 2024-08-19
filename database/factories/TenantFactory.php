<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantFactory extends Factory
{
    public function definition(): array
    {
        $user = User::factory()->make();

        return [
            'owner_id' => $user->id,
        ];
    }
}
