<?php

namespace Database\Factories;

use App\Models\Statuslabel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatuslabelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Statuslabel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->sentence(),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
            'user_id' => User::factory()->superuser(),
            'deleted_at' => null,
            'deployable' => 0,
            'pending' => 0,
            'archived' => 0,
            'notes' => '',
        ];
    }

    public function rtd()
    {
        return $this->state(function () {
            return [
                'notes' => $this->faker->sentence(),
                'deployable' => 1,
                'default_label' => 1,
            ];
        });
    }

    public function pending()
    {
        return $this->state(function () {
            return [
                'notes' => $this->faker->sentence(),
                'pending' => 1,
                'default_label' => 1,
            ];
        });
    }

    public function archived()
    {
        return $this->state(function () {
            return [
                'notes' => 'These assets are permanently undeployable',
                'archived' => 1,
                'default_label' => 0,
            ];
        });
    }

    public function outForDiagnostics()
    {
        return $this->state(function () {
            return [
                'name' => 'Out for Diagnostics',
                'default_label' => 0,
            ];
        });
    }

    public function outForRepair()
    {
        return $this->state(function () {
            return [
                'name'      => 'Out for Repair',
                'default_label' => 0,
            ];
        });
    }

    public function broken()
    {
        return $this->state(function () {
            return [
                'name'      => 'Broken - Not Fixable',
                'default_label' => 0,
            ];
        });
    }

    public function lost()
    {
        return $this->state(function () {
            return [
                'name'      => 'Lost/Stolen',
                'default_label' => 0,
            ];
        });
    }
}
