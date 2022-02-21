<?php

namespace Database\Seeders;
use App\Models\Blog;
use App\Models\Category;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

use Faker\Generator;
use Illuminate\Container\Container;

class BlogSeeder extends Seeder{
    protected $faker;

    public function __construct(){
        $this->faker = $this->withFaker();
    }

    protected function withFaker(){
        return Container::getInstance()->make(Generator::class);
    }

    public function run(){
        $file_to_upload = public_path().'/uploads/blogs/';
        if (!File::exists($file_to_upload))
            File::makeDirectory($file_to_upload, 0777, true, true);

        $categories = Category::select('id', 'name')->get();
        
        foreach($categories as $category){
            for($i=1; $i<=rand(5, 10); $i++){
                $i_loop = rand(1, 6);

                Blog::create([
                    'category_id' => $category->id,
                    'heading' => $this->faker->sentence,
                    'body' => "<p>".$this->faker->text($maxNbChars = 300)."</p>",
                    'tags' => $category->name,
                    'cover_image' => $i_loop.'.jpg',
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'created_by' => 1,
                    'updated_at' => date('Y-m-d H:i:s'),
                    'updated_by' => 1
                ]);

                if(file_exists(public_path("/dummy/blogs/$i_loop.jpg")) && !file_exists(public_path("/uploads/blogs/$i_loop.jpg"))){
                    File::copy(public_path("/dummy/blogs/$i_loop.jpg"), public_path("/uploads/blogs/$i_loop.jpg"));
                }
            }
        }
    }
}
