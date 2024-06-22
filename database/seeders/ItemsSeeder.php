<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Item;
class ItemsSeeder extends Seeder
{
    public function run()
    {
        Item::factory()->Count(10)->Create();

    }
}
