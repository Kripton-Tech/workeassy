<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkspaceRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        if($this->method() == 'PATCH'){
            return [
                'title' => 'required',
                'sub_title' => 'required',
                'description' => 'required',
            ];
        }else{
            return [
                'title' => 'required',
                'sub_title' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png',
                'cover_image' => 'required|mimes:jpg,jpeg,png'
            ];
        }
    }

    public function messages(){
        return [
            'title.required' => 'Please enter title',
            'sub_title.required' => 'Please enter sub title',
            'description.required' => 'Please enter description',
            'image.required' => 'Please select image',
            'image.mimes' => 'Please select jpg, jpeg or png image',
            'cover_image.required' => 'Please select cover image',
            'cover_image.mimes' => 'Please select jpg, jpeg or png image'
        ];
    }
}
