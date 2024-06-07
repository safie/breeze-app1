<?php

namespace Database\Seeders;

use App\Models\Isu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IsuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Isu::factory()
            ->count(10)
            ->create();
    }
}
