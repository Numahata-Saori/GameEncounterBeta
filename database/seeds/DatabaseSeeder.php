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
        $this->call(AdminsTableSeeder::class);
        $this->call(ConsoleTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(CommunitylistTableSeeder::class);
        $this->call(ResidenceTableSeeder::class);
        $this->call(HolidayTableSeeder::class);
        $this->call(FrequencyTableSeeder::class);
    }
}
