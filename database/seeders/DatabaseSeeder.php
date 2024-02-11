<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        $this->call([
            //TagSeeder::class,
            UsersSeeder::class,
            SettingsSeeder::class,
            PagesSeeder::class,
            LanguagesSeeder::class,
            TitlesSeeder::class,
            PackagesSeeder::class,
            CitysSeeder::class,
            CountriesSeeder::class,
            AgenciesSeeder::class,
            MenusSeeder::class,
            PermissionsSeeder::class,
            ProperrtysStatusSeeder::class,
            ProperrtysTypesSeeder::class,
            FeaturesSeeder::class,
            //ContentSeeder::class,
            AttachSuperAdminPermissions::class
        ]);
    }
}

