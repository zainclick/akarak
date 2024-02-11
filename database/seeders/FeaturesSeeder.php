<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Features;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Features::create([
            'name_ar'=>'مكيف هواء',
            'name_en'=>"Air Condition",
            'status'=>0,
        ]);
        Features::create([
            'name_ar'=>'سرير',
            'name_en'=>"Bedding",
            'status'=>0,
        ]);
        Features::create([
            'name_ar'=>'تدفئة',
            'name_en'=>"Heating",
            'status'=>0,
        ]);
        Features::create([
            'name_ar'=>'انترنت',
            'name_en'=>"Internet",
            'status'=>0,
        ]);
        Features::create([
            'name_ar'=>'ميكرويف',
            'name_en'=>"Microwave",
            'status'=>0,
        ]);
        Features::create([
            'name_ar'=>'مسموح التدخين',
            'name_en'=>"Smoking Allow",
            'status'=>0,
        ]);
        Features::create([
            'name_ar'=>'روف',
            'name_en'=>"Roof",
            'status'=>0,
        ]);
        Features::create([
            'name_ar'=>'بلكونة',
            'name_en'=>"Balcony",
            'status'=>0,
        ]);
        Features::create([
            'name_ar'=>'شاطئ',
            'name_en'=>"Beach",
            'status'=>0,
        ]);
        Features::create([
            'name_ar'=>'باركينج',
            'name_en'=>"Parking",
            'status'=>0,
        ]);
        Features::create([
            'name_ar'=>'جيم',
            'name_en'=>"Gym",
            'status'=>0,
        ]);
        Features::create([
            'name_ar'=>'حمام سباحة',
            'name_en'=>"Swimming pool",
            'status'=>0,
        ]);
    }
}
