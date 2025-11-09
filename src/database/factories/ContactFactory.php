<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->randomElement([Contact::GENDER_MALE, Contact::GENDER_FEMALE, Contact::GENDER_OTHER]),
            'email' => $this->faker->unique()->safeEmail(),
            'tel' => $this->faker->numerify('###########'),
            'address' => $this->faker->city() . $this->faker->streetAddress(),
            'building' => $this->faker->optional()->secondaryAddress(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'detail' => $this->faker->realText(120),
        ];
    }
}
