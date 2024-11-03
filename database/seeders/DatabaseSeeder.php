<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Master;
use App\Models\User;
use App\Models\UserAppointment;
use App\Models\UserMaster;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create();
        Master::factory()->count(2)->create();
        Appointment::factory()->count(1)->create();
        UserMaster::factory()->count(1)->create();
        UserAppointment::factory()->count(1)->create();

    }
}
