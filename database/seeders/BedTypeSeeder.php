<?php

namespace Database\Seeders;

use App\Models\BedType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BedType::insert([
            ['name' => 'single'],
            ['name' => 'double'],
            ['name' => 'queen'],
            ['name' => 'king'],
        ]);
    }
}
