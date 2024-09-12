<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Carbon\CarbonPeriod;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $start = now()->startOfMonth()->subMonthsNoOverflow();
        $end = now();
        $period = CarbonPeriod::create($start, '1 day', $end); // 1 day increment
        // create 5 users and save to db
        User::factory(5)->create()
            // create tasks for each user & day 
            ->each(function ($user) use ($period) {
                foreach ($period as $date) {
                    // formatting date w/ hr & minutes
                    $date->hour(rand(0, 23))->minute(rand(0, 6) * 10);
                    Task::factory()->create([
                        // create task with these attr
                        'user_id' => $user->id,
                        'created_at' => $date,
                        'updated_at' => $date
                    ]);
                }
            });
    }
}