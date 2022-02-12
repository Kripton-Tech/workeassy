<?php

namespace Database\Seeders;
use App\Models\Workspace;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class WorkspaceSeeder extends Seeder{
    public function run(){
        $file_to_upload = public_path().'/uploads/workspace/';
        if (!File::exists($file_to_upload))
            File::makeDirectory($file_to_upload, 0777, true, true);

        $data = [
                    ['title' => 'Dedicated Desk', 'sub_title' => 'A dedicated desk in a coworking space is a workstation that is all yours.', 'description' => 'Efficiently designed desks which maximise functionality while keeping things simple. Dedicated desks provide you unmatched flexibility. It is for those who want a personal space, yet wish to network and collaborate with co-workers around them. They are specifically made for individuals looking to establish their brand; entrepreneurs, freelancers, or others who have an idea of starting something and are looking for a professional and collaborative working environment. Desks can be rented from a period of only 3 days to 6 months. Once a member is assigned a desk, that particular seat will not be used by anyone else. Perfectly furnished desk with a secured storage space. All plans come with a complementary business kit containing all the essentials to help you kick-start your work. All you have to do is plug and play!'],
                    ['title' => 'Conference room', 'sub_title' => 'Fully equipped space with top notch technical features for presentations & meetings. ', 'description' => 'Fully equipped conference room with all state of the art technological infrastructures allowing our members to conduct video conferencing, video projections and presentations, all enabled through high speed internet. It can accommodate a team of 2 – 8 people, comfortably. Featuring an ergonomic furniture and high tech infrastructure, it\'s perfect for conducting meetings and events. Members using dedicated desks and private cabins can book the conference room as per their requirement. The allotment of the space will be done on first come first serve basis. Icons of all the amenities such as Wi-Fi, tea, coffee, LCD TV etc. Buttons for book a tour, get a call back and live chat.'],
                    ['title' => 'Private cabin/office', 'sub_title' => 'Larger spaces separated by partition from the rest of the co working space.', 'description' => 'Thoughtfully created private cabins ideal for a team comprising 1 – 4 persons, who need a larger area and increased privacy. These are designed to maximise teamwork and productivity amongst the members. The multi-seater cabins give you the best of both worlds. You can reap the benefits of a collaborative work space and also have a private space to execute your ideas. Private cabins feature air conditioner, lockable doors and efficient office furniture and storage drawers allowing you to plug and play as soon as you are assigned your space. All plans come with a complementary business kit containing all the essentials to help you kick-start your work. All you have to do is plug and play!']
                ];

        $i = 1;
        $j = 11;
        foreach($data as $row){
            Workspace::create([
                'title' => $row['title'],
                'sub_title' => $row['sub_title'],
                'image' => "$i.jpg",
                'cover_image' => "$j.jpg",
                'description' => $row['description'],
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);

            if(file_exists(public_path("/dummy/workspace/$i.jpg")) && !file_exists(public_path("/uploads/workspace/$i.jpg")) ){
                File::copy(public_path("/dummy/workspace/$i.jpg"), public_path("/uploads/workspace/$i.jpg"));
            }

            if(file_exists(public_path("/dummy/workspace/$j.jpg")) && !file_exists(public_path("/uploads/workspace/$j.jpg")) ){
                File::copy(public_path("/dummy/workspace/$j.jpg"), public_path("/uploads/workspace/$j.jpg"));
            }
            
            $i++;
            $j++;
        }
    }
}