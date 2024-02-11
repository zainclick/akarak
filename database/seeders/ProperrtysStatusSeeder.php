<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\PropertysStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProperrtysStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PropertysStatus::create([
            'name_ar'=>'إيجار',
            'name_en'=>"Rent",
            'status'=>0,
        ]);
        PropertysStatus::create([
            'name_ar'=>'بيع',
            'name_en'=>"Sale",
            'status'=>0,
        ]);
    }
}
