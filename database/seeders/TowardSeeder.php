<?php

namespace Database\Seeders;
use App\Models\Toward;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TowardSeeder extends Seeder{
    public function run(){
        $file_to_upload = public_path().'/uploads/toward/';
        if (!File::exists($file_to_upload))
            File::makeDirectory($file_to_upload, 0777, true, true);

        $data = ['Sanitization', 'Social Distancing', 'Temperature Check', 'Mask Compulsion', 'Hygienic Pantry', 'Enhanced Air Ventilation'];

        $i = 1;
        foreach($data as $row){
            Toward::create([
                'title' => $row,
                'image' => "$i.jpg",
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            if(file_exists(public_path("/dummy/toward/$i.jpg")) && !file_exists(public_path("/uploads/toward/$i.jpg")) ){
                File::copy(public_path("/dummy/toward/$i.jpg"), public_path("/uploads/toward/$i.jpg"));
            }
            
            $i++;
        }
    }
}