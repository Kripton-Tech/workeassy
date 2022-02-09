<?php

namespace Database\Seeders;
use App\Models\Video;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VideoSeeder extends Seeder{
    public function run(){
        $data = [
                    'https://www.youtube.com/embed/Y5BRCzZ6Ro0?controls=1&rel=0&playsinline=0&modestbranding=0&autoplay=0&enablejsapi=1&origin=https%3A%2F%2Fworkeasy.in&widgetid=1',
                    'https://www.youtube.com/embed/FOM3o1RIhqk?controls=1&rel=0&playsinline=0&modestbranding=0&autoplay=0&enablejsapi=1&origin=https%3A%2F%2Fworkeasy.in&widgetid=2',
                    'https://www.youtube.com/embed/FOM3o1RIhqk?controls=1&rel=0&playsinline=0&modestbranding=0&autoplay=0&enablejsapi=1&origin=https%3A%2F%2Fworkeasy.in&widgetid=3'
                ];

        foreach($data as $row){
            Video::create([
                'link' => $row,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);
        }
    }
}