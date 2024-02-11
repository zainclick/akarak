<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\languages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        languages::create([
            'name_ar'=>'العربية',
            'name_en'=>"Arabic",
            'slug'=>"arabic",
            'status'=>0,
        ]);

        languages::create([
            'name_ar'=>'الإنجليزية',
            'name_en'=>"English",
            'slug'=>"english",
            'status'=>0,
        ]);

        languages::create([
            'name_ar'=>'الفرنسية',
            'name_en'=>"french",
            'slug'=>"french",
            'status'=>0,
        ]);
    }
}
