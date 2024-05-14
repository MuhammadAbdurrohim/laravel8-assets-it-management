<?php

namespace Database\Seeders;

use App\Models\Consumable;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsumableSeeder extends Seeder
{
    public function run()
    {
        Consumable::truncate();
        DB::table('consumables_users')->truncate();

        $admin = User::where('permissions->superuser', '1')->first() ?? User::factory()->firstAdmin()->create();

        Consumable::factory()->count(1)->cardstock()->create(['user_id' => $admin->id]);
        Consumable::factory()->count(1)->paper()->create(['user_id' => $admin->id]);
        Consumable::factory()->count(1)->ink()->create(['user_id' => $admin->id]);
    }
}
