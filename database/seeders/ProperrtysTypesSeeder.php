<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\PropertysTyps;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProperrtysTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PropertysTyps::create([
            'name_ar'=>'منزل',
            'name_en'=>"House",
            'status'=>0,
        ]);
        PropertysTyps::create([
            'name_ar'=>'عقار',
            'name_en'=>"Apartment",
            'status'=>0,
        ]);
        PropertysTyps::create([
            'name_ar'=>'فيلا',
            'name_en'=>"Villa",
            'status'=>0,
        ]);
        PropertysTyps::create([
            'name_ar'=>'تجاري',
            'name_en'=>"Commercial",
            'status'=>0,
        ]);
        PropertysTyps::create([
            'name_ar'=>'مكاتب',
            'name_en'=>"Offices",
            'status'=>0,
        ]);
        PropertysTyps::create([
            'name_ar'=>'جراج',
            'name_en'=>"Garage",
            'status'=>0,
        ]);
    }
}
