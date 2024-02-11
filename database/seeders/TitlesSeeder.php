<?php

namespace Database\Seeders;

use App\Models\Backend\titles;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        titles::create([
            'name_ar'=>'CEO',
            'name_en'=>"CEO",
            'slug'=>"ceo",
            'status'=>0,
        ]);

        titles::create([
            'name_ar'=>'مدير',
            'name_en'=>"Manager",
            'slug'=>"manager",
            'status'=>0,
        ]);
    }
}
