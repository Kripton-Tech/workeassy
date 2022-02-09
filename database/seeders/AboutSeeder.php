<?php

namespace Database\Seeders;
use App\Models\About;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class AboutSeeder extends Seeder{

    public function run(){
        $file_to_upload = public_path().'/uploads/about/';
        if (!File::exists($file_to_upload))
            File::makeDirectory($file_to_upload, 0777, true, true);

        $data = [
                    ['title' => 'Our Vision', 'description' => 'To fundamentally change and improve the way people work. By providing flexible, reliable and community centric workspace at a reasonable rate, we want to become the No. 1 choice for entrepreneurs, freelancers, professionals, and businesses for their office needs.'],
                    ['title' => 'Our Mission', 'description' => 'Ever since the inception of WorkEasy, one thing that we have constantly believed in is that what we are selling is not merely a space or a service. It is a revolution. A revolution in the way work is done. We were well aware that the transition was not going to happen overnight, however the pros of an attempt to make Rajkot a coworking friendly city most certainly outweigh the negatives. Apart from seizing the initial mover advantage, what drove us towards choosing this business from an ocean of others is that coworking gives birth to communities that thrive by giving their members the chance to interact, collaborate and support one another. As a group of entrepreneurs, we were thrilled to learn that we stand a chance to help transform our city into a better place to work and Iive, by creating an environment that improves the work-life balance of citizens through offering flexible services that allow them to focus on their work, with excellent work environment. Our communities are open and they welcome new members readily. Our target communities comprise a broad array of members with equal or an even broader range of backgrounds and interests. From established businesses to start-ups, freelancers, contractors, authors, artists and more our target members represent just about every industry and interest imaginable.'],
                    ['title' => 'Our Values', 'description' => 'Collaboration and community: The occupants of a co-working space often collaborate with one another, even if they work in unrelated industries.  They become bound together to form a tight-knit community over time through shared experiences. Workeasy looks forward to facilitating productive interactions between members, fostering the relationships that exist between them and creating opportunities for members to interact with one another. Openness: The people who work in coworking spaces are open-minded with fellow members of the community, making it easy for everyone to feel like they fit in. In a coworking space, you never know who you’ll work next to, what you’ll learn or what you’ll get involved with from day to day interactions. Being open to the unexpected often makes leasing coworking space rewarding for many community members. Sustainability: This, in a coworking community is primarily about supporting, nourishing and encouraging fellow co-workers. It’s about giving, about contributing, for it is through these actions that the community itself – made up of individual people – is sustained. By its very nature, coworking tends to be eco-friendly as well. Resources such as power, phone, internet service, and even space are shared in a much more efficient manner, compared to alternative working style. Accessibility: Coworking spaces are about offering affordable alternatives to the community. Providing a financially as well as physically accessible option to independent workers is the reason why we chose this location, one of the most popular commercial hubs in the centre of the city.']
                ];

        $i = 1;
        foreach($data as $row){
            About::create([
                'title' => $row['title'],
                'image' => "$i.jpg",
                'description' => $row['description'],
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            if(file_exists(public_path("/dummy/about/$i.jpg")) && !file_exists(public_path("/uploads/about/$i.jpg")) ){
                File::copy(public_path("/dummy/about/$i.jpg"), public_path("/uploads/about/$i.jpg"));
            }
            
            $i++;
        }
    }
}