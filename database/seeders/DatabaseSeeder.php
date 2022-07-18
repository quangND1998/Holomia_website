<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;

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
            // PermissionSeeder::class,
            // RoleSeeder::class,
            UserSeeder::class,
            // ThemeSeeder::class,
            // PageSeeder::class,
        ]);
    }
}
