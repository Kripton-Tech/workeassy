<?php

namespace Database\Seeders;
use App\Models\Gallery;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class GallerySeeder extends Seeder{
    public function run(){
        $file_to_upload = public_path().'/uploads/gallery/';
        if (!File::exists($file_to_upload))
            File::makeDirectory($file_to_upload, 0777, true, true);

        for($i=1; $i<=6; $i++){
            Gallery::create([
                'image' => "$i.jpg",
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            if(file_exists(public_path("/dummy/gallery/$i.jpg")) && !file_exists(public_path("/uploads/gallery/$i.jpg")) ){
                File::copy(public_path("/dummy/gallery/$i.jpg"), public_path("/uploads/gallery/$i.jpg"));
            }
        }
    }
}