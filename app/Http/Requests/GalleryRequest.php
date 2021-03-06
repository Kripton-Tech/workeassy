<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        if($this->method() == 'PATCH'){
            return [
                'category_id' => 'required'
            ];
        }else{
            return [
                'category_id' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png'
            ];
        }
    }

    public function messages(){
        return [
            'category_id.required' => 'Please select category',
            'image.required' => 'Please select image',
            'image.mimes' => 'Please select jpg, jpeg or png image'
        ];
    }
}
