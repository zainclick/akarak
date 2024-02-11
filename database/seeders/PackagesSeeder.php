<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Packages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Packages::create([
            'name'=>'Free',
            'price'=>"0",
            'slug'=>"Free",
            'agent_count' => 0,
            'properties_count' => 0,
            'properties_features_count' => 0,
            'adds_count' => 0,
            'admin_id' => 1,
            'status'=>0,
        ]);

        Packages::create([
            'name'=>'Premium',
            'price'=>"1500",
            'slug'=>"Premium",
            'agent_count' => 3,
            'properties_count' => 5,
            'properties_features_count' => 0,
            'adds_count' => 0,
            'admin_id' => 1,
            'status'=>0,
            'type' => 'year',
            'duration' => 365,
        ]);

        Packages::create([
            'name'=>'Gold',
            'price'=>"3000",
            'slug'=>"Gold",
            'agent_count' => 5,
            'properties_count' => 15,
            'properties_features_count' => 1,
            'adds_count' => 0,
            'admin_id' => 1,
            'status'=>0,
            'type' => 'year',
            'duration' => 365,
        ]);

        Packages::create([
            'name'=>'Vip',
            'price'=>"4000",
            'slug'=>"vip",
            'agent_count' => 99999,
            'properties_count' => 999999,
            'properties_features_count' => 5,
            'adds_count' => 2,
            'admin_id' => 1,
            'status'=>0,
            'type' => 'year',
            'duration' => 365,
        ]);

        // Packages monthly 

        Packages::create([
            'name'=>'Premium',
            'price'=>"600",
            'slug'=>"Premium-monthly",
            'agent_count' => 3,
            'properties_count' => 5,
            'properties_features_count' => 0,
            'adds_count' => 0,
            'admin_id' => 1,
            'status'=>0,
            'type' => 'monthly',
            'duration' => 30,
        ]);

        Packages::create([
            'name'=>'Gold',
            'price'=>"800",
            'slug'=>"Gold-monthly",
            'agent_count' => 5,
            'properties_count' => 15,
            'properties_features_count' => 1,
            'adds_count' => 0,
            'admin_id' => 1,
            'status'=>0,
            'type' => 'monthly',
            'duration' => 30,
        ]);

        Packages::create([
            'name'=>'Vip',
            'price'=>"1000",
            'slug'=>"vip-monthly",
            'agent_count' => 99999,
            'properties_count' => 999999,
            'properties_features_count' => 5,
            'adds_count' => 2,
            'admin_id' => 1,
            'status'=>0,
            'type' => 'monthly',
            'duration' => 30,
        ]);
    }
}
