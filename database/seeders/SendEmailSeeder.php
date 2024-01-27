<?php

namespace Database\Seeders;

use App\Models\SendEmail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SendEmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SendEmail::factory(10)->create();
    }
}
