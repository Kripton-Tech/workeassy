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
            AboutSeeder::class,
            FaqSeeder::class,
            WorkspaceSeeder::class,
            GallerySeeder::class,
            CategorySeeder::class,
            BlogSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
