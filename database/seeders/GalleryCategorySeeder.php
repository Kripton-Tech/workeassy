<?php

namespace Database\Seeders;
use App\Models\GalleryCategory;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GalleryCategorySeeder extends Seeder{
    public function run(){
        $data = [
            'Dedicated Desk',
            'Conference room',
            'Private cabin/office',
            'Flexi Space'
        ];

        foreach($data as $row){
            GalleryCategory::create([
                'title' => $row,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);
        }
    }
}