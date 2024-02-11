<?php

namespace Database\Seeders;

use App\Models\Backend\citys;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitysSeeder extends Seeder
{
    /**
     * Run the database seeds. أبوظبي ودبي، والشارقة، ورأس الخيمة، وعجمان، وأم القيوين، والفجيرة
     */
    public function run(): void
    {
        citys::create([
            'name_ar'=>'أبو ظبي',
            'name_en'=>"Abu Dhabi",
            'slug'=>"abu-Dhabi",
            'status'=>0,
        ]);

        citys::create([
            'name_ar'=>'دبي',
            'name_en'=>"Dubai",
            'slug'=>"dubai",
            'status'=>0,
        ]);

        citys::create([
            'name_ar'=>'الشارقة',
            'name_en'=>"Sharja",
            'slug'=>"sharja",
            'status'=>0,
        ]);

        citys::create([
            'name_ar'=>'رأس الخيمة',
            'name_en'=>"Ras al khaimah",
            'slug'=>"ras-alkhaimah",
            'status'=>0,
        ]);

        citys::create([
            'name_ar'=>'عجمان',
            'name_en'=>"Ajman",
            'slug'=>"ajman",
            'status'=>0,
        ]);

        citys::create([
            'name_ar'=>'أم القيوين',
            'name_en'=>"Umm Al Quwain",
            'slug'=>"umm-AlQuwain",
            'status'=>0,
        ]);

        citys::create([
            'name_ar'=>'الفجيرة',
            'name_en'=>"Al Fujairah",
            'slug'=>"AlFujairah",
            'status'=>0,
        ]);
    }
}
