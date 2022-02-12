<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        if($this->method() == 'PATCH'){
            return [
                'title' => 'required'
            ];
        }else{
            return [
                'title' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png'
            ];
        }
    }

    public function messages(){
        return [
            'title.required' => 'Please enter title',
            'image.required' => 'Please select image',
            'image.mimes' => 'Please select jpg, jpeg or png image'
        ];
    }
}
