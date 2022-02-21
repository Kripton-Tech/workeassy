<?php

namespace Database\Seeders;
use App\Models\Testimonial;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TestimonialSeeder extends Seeder{
    public function run(){
        $file_to_upload = public_path().'/uploads/testimonial/';
        if (!File::exists($file_to_upload))
            File::makeDirectory($file_to_upload, 0777, true, true);

        $data = [
            [
                'name' => 'Gajjar Mitul',
                'title' => 'Founder',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
            ],
            [
                'name' => 'Mustan Sir',
                'title' => 'Owner',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
            ],
            [
                'name' => 'HardIk Patel',
                'title' => 'Employee',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
            ],
            [
                'name' => 'Nitish Kurmi',
                'title' => 'Manager',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'
            ],
        ];

        $i = 1;
        foreach($data as $row){
            Testimonial::create([
                'name' => $row['name'],
                'title' => $row['title'],
                'description' => $row['description'],
                'image' => "$i.jpg",
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            if(file_exists(public_path("/dummy/testimonial/$i.jpg")) && !file_exists(public_path("/uploads/testimonial/$i.jpg")) ){
                File::copy(public_path("/dummy/testimonial/$i.jpg"), public_path("/uploads/testimonial/$i.jpg"));
            }
            
            $i++;
        }
    }
}