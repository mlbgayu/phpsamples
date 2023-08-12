<?php

namespace Database\Factories;

use App\Models\gfygf;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class gfygfFactory extends Factory{
    protected $model = gfygf::class;

    public function definition(): array
    {
        return [
            'fn' => $this->faker->word(),//
'ln' => $this->faker->word(),
'age' => $this->faker->randomNumber(),
'sex' => $this->faker->word(),
'pass' => $this->faker->word(),
'userid' => $this->faker->randomNumber(),
'created_at' => Carbon::now(),
'updated_at' => Carbon::now(),
        ];
    }
}
