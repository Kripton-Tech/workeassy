<?php

namespace Database\Seeders;
use App\Models\Blog;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BlogSeeder extends Seeder{
    public function run(){
        $data = [
                    ['title' => 'Flexibility', 'description' => 'Working at WorkEasy coworking space means you are not getting tied up with unnecessary yearlong rental agreements which are not feasible for a lot of organisations and entrepreneurs. That means you can rent a dedicated desk or a private cabin for a minimum of 3 days or 1 week respectively. Bigger conference room can be rented on an hourly basis as well. This drastically decreases the pressure of traditional long term leases and these features are very essential for growing entrepreneurs and companies. Taste and see if it works for you (we are damn sure it would). It\'s flexibility like you have never seen before. It\'s flexibility on STEROIDS.'],
                    ['title' => 'Cost Saving', 'description' => 'Unlike traditional offices, you only pay for the space you need in a coworking space. Whether you are a freelancer, start up or an established organisation, you will never end up paying for the space you would never use. More importantly, our dedicated desks, private offices and conference room comes with built in functional furniture, high speed internet connectivity, cleaning staff, printing services, bathrooms and a fully functional pantry which drastically eliminates the overhead costs which prove to be a huge burden in traditional offices.'],
                    ['title' => 'Networking', 'description' => 'You are never working alone in a coworking space. Whether you are a one man army or a team, there are endless opportunities for you to meet new people and build real relationships which will help you grow and prosper professionally and socially. This is one of the most vital reasons behind the massive growth of coworking spaces in the last 10 years or so. There are no limits to the amount of collaboration which can be done by working in a space where you could potentially meet a new person every single day! Its ability to connect you with people you otherwise wouldn\'t meet is what makes it a no brainer for a freelancer, growing start-up or an established organisation.'],
                    ['title' => 'Reduce Ioneliness, Increase Connection', 'description' => 'Where would you rather work? In a place where you can meet passionate, enthusiastic and likeminded people or in your untidy bedroom or living room? Coworking spaces allow you to surround yourself with a network of professionals across varied fields and let you reduce the loneliness which often comes as a by-product of Work from Home. Research around the subject shows the importance of those small, seemingly irrelevant conversations you have with the receptionist, a neighbour or the postman can help heighten your happiness. These interactions are the threads that bind coworking communities together. There is a feeling of belongingness as soon as you arrive. From the person greeting you as you arrive, to the conversation with a co-worker sitting next to you, every small part forms a unique working experience.'],
                    ['title' => 'Increase Productivity', 'description' => 'Let\'s be honest. We all have experienced the dreaded Work from Home during the lockdowns. By now we know the importance of a professional working environment and the need of having a place where you go to “work”. While it felt comfortable in the beginning, the majority realised that WFH is not going to work for them. It just isn\'t productive. Co working spaces hit the right chord in providing that perfect balance between a professional environment and opportunities to unwind and also indulge in networking and collaborating with other co-workers. It has got everything in it to let you concentrate on what really matters and maximise your productivity. Stylish set-up, office plants, pin up boards, brainy quotes on walls, open to sky balcony and other amenities play a vital role in forming the complete co working experience.'],
                    ['title' => 'Workflow Management', 'description' => 'From the morning meeting flurry to the 3 p.m. slump, your focus and energy levels fluctuate during the workday—and your workspace should accommodate this. Typically, co working spaces blend a range of work environments to cater to different work styles. Offering greater variety than a traditional office, yet greater structure compared with working from home, coworking spaces are optimized for productivity. Progress comes easy in intentionally designed spaces, while intangibles like background music, natural light, and moderated air temperatures keep you energized and refreshed.'],
                    ['title' => 'Breaking out of your confort zone', 'description' => 'Working in a collaborative environment pushes you to strike a conversation with co-workers which often leads to long term and meaningful relationships which are key to growth for a freelancer or a start-up. Breaking out of your comfort zone by meeting new people, you\'re required to inculcate creativity and innovation in the face of uncertainty. Traits which are extremely vital to the growth of an entrepreneur or an organisation in the current business environment.'],
                    ['title' => 'Bring structure to the day', 'description' => 'A workday at home can pass in a blur, with minimal structure and without a commute to separate home life from work responsibilities. As a result, this schedule can have you working long past the time you should have clocked off: checking your emails from bed, or reading through project plans before your morning coffee. Coworking spaces offer structure to your day, providing a place to arrive every morning and leave once the work is done. Whenever you choose to start work each day, you\'ll find that this structure helps prevent the unbidden creep of work life into personal time.']
                ];

        foreach($data as $row){
            Blog::create([
                'title' => $row['title'],
                'description' => $row['description'],
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);
        }
    }
}