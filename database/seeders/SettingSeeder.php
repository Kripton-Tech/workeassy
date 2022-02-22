<?php

namespace Database\Seeders;
use App\Models\Setting;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SettingSeeder extends Seeder{
    public function run(){
        $general = [
            'SITE_TITLE' => 'Workeasy', 
            'SITE_TITLE_SF' => 'W-E', 
            'CONTACT_NUMBER' => '+91-74349 10101',
            'MAIN_CONTACT_NUMBER' => '+91-74349 10101',
            'CONTACT_EMAIL' => 'connect@workeasy.in',
            'MAIN_CONTACT_EMAIL' => 'connect@workeasy.in',
            'CONTACT_ADDRESS' => 'Sardar Nagar, Rajkot',
            'MAIN_CONTACT_ADDRESS' => 'Sardar Nagar, Rajkot'
        ];

        foreach($general as $key => $value){
            Setting::create([
                'key' => $key,
                'value' => $value,
                'type' => 'general',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);
        }

        $mails = [
            'MAIL_MAILER' => 'smtp',
            'MAIL_HOST' => 'mail.kriptontech.com',
            'MAIL_PORT' => '26',
            'MAIL_USERNAME' => 'test@kriptontech.com',
            'MAIL_PASSWORD' => 'Test@kriptontech123',
            'MAIL_ENCRYPTION' => 'tls',
            'MAIL_FROM_ADDRESS' => 'test@kriptontech.com',
            'MAIL_FROM_NAME' => 'Work Easy'
        ];

        foreach($mails as $key => $value){
            Setting::create([
                'key' => $key,
                'value' => $value,
                'type' => 'mail',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);
        }

        $social = [
            'FACEBOOK' => 'http://www.facbook.com/workeasy.coworking',
            'INSTAGRAM' => 'http://www.instagram.com/workeasy.coworking',
            'YOUTUBE' => 'http://www.youtube.com/workeasy.coworking',
            'LINKEDIN' => 'https://www.linkedin.com/company/work-easy-coworking-space'
        ];

        foreach($social as $key => $value){
            Setting::create([
                'key' => $key,
                'value' => $value,
                'type' => 'social',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);
        }

        $logo = [
            'FEVICON' => 'fevicon.jpeg',
            'LOGO' => 'logo.png',
            'SMALL_LOGO' => 'small_logo.png'
        ];

        foreach($logo as $key => $value){
            Setting::create([
                'key' => $key,
                'value' => $value,
                'type' => 'logo',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => 1,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 1
            ]);
        }

        $folder_to_upload = public_path().'/uploads/logo/';

        if (!\File::exists($folder_to_upload)) {
            \File::makeDirectory($folder_to_upload, 0777, true, true);
        }

        if(file_exists(public_path('/dummy/fevicon.jpeg')) && !file_exists(public_path('/uploads/logo/fevicon.jpeg')) ){
            File::copy(public_path('/dummy/fevicon.jpeg'), public_path('/uploads/logo/fevicon.jpeg'));
        }

        if(file_exists(public_path('/dummy/logo.png')) && !file_exists(public_path('/uploads/logo/logo.png')) ){
            File::copy(public_path('/dummy/logo.png'), public_path('/uploads/logo/logo.png'));
        }

        if(file_exists(public_path('/dummy/small_logo.png')) && !file_exists(public_path('/uploads/logo/small_logo.png')) ){
            File::copy(public_path('/dummy/small_logo.png'), public_path('/uploads/logo/small_logo.png'));
        }
    }
}
