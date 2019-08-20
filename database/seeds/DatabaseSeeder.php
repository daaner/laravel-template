<?php

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
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(ScriptCodeSeeder::class);

        //modules seeder
        $this->call(Modules\Blog\database\seeds\BlogCategorySeeder::class);
    }
}
