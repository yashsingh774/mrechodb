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
        $this->call(SettingTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(UpdateTableSeeder::class);
        $this->call(SectionTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(BannerTableSeeder::class);
    }
}
