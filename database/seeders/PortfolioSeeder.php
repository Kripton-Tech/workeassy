<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Portfolio;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PortfolioSeeder extends Seeder{

    public function run(){
        $file_to_upload = public_path().'/uploads/portfolio/';
        if (!File::exists($file_to_upload))
            File::makeDirectory($file_to_upload, 0777, true, true);

        $categories = Category::select('id', 'title')->where(['status' => 'active'])->get();

        $i = 1;
        foreach($categories as $row){
            $loop = rand(1, 3);
            
            for($j=1; $j<=$loop; $j++){
                $i_loop = rand($i, 6);

                Portfolio::create([
                    'category_id' => $row->id,
                    'title' => "Lorem Ipsum ".$row->title."-".$row->id,
                    'image' => $i_loop.'.jpg',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => 1
                ]);
    
                if(file_exists(public_path("/dummy/portfolio/$i_loop.jpg")) && !file_exists(public_path("/uploads/portfolio/$i_loop.jpg")) ){
                    File::copy(public_path("/dummy/portfolio/$i_loop.jpg"), public_path("/uploads/portfolio/$i_loop.jpg"));
                }
            }

            $i++;
        }
    }
}