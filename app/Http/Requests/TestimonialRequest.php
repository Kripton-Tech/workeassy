<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        if($this->method() == 'PATCH'){
            return [
                'name' => 'required',
                'title' => 'required',
                'description' => 'required',
            ];
        }else{
            return [
                'name' => 'required',
                'title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png'
            ];
        }
    }

    public function messages(){
        return [
            'name.required' => 'Please enter name',
            'title.required' => 'Please enter title',
            'description.required' => 'Please enter description',
            'image.required' => 'Please select image',
            'image.mimes' => 'Please select jpg, jpeg or png image'
        ];
    }
}
