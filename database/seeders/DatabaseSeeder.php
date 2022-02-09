<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    public function run(){
        $this->call([
            UserSeeder::class,
            SettingSeeder::class,
            SliderSeeder::class,
            TowardSeeder::class,
            VideoSeeder::class,
            AboutSeeder::class,
            BlogSeeder::class,
            WorkspaceSeeder::class,
            GallerySeeder::class,
        ]);
    }
}
