<?php

namespace Database\Seeders;
use App\Models\Category;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder{
    public function run(){
        $array = [
            'Dedicated' => 'Dedicated',
            'Conferance' => 'Conferance',
            'Private' => 'Private',
            'Flexi' => 'Flexi'
        ];

        foreach($array as $key => $value){
            Category::create([
                'name' => $key,
                'discription' => $value,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);
        }
    }
}
