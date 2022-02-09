<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        if($this->method() == 'PATCH'){
            return [
                'link' => 'required'
            ];
        }else{
            return [
                'link' => 'required'
            ];
        }
    }

    public function messages(){
        return [
            'link.required' => 'Please enter link'
        ];
    }
}
