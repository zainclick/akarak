<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\agencies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agencies = agencies::count();
        if($agencies==0)
            agencies::create([
                'name_ar'=>"إعمار",
                'name_en'=>"Emaar",
                'package' => 1,
                'slug' => 'emaar',
                'status' => 0,
                'mobile' => '657',
                "email"=>'agency@agency.com',
                "password"=>\Hash::make('password'),
                "city" => 1,
                "country" => 1,
                'admin_id' => 1,
            ]);
    }
}
