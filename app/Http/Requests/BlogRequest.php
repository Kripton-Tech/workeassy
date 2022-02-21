<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        if($this->method() == 'PATCH'){
            return [
                'category_id' => 'required',
                'heading' => 'required',
                'body' => 'required',
                'tags' => 'required'
            ];
        }else{
            return [
                'category_id' => 'required',
                'heading' => 'required',
                'body' => 'required',
                'tags' => 'required'
            ];
        }
    }

    public function messages(){
        return [
            'category_id.required' => 'Please select category',
            'heading.required' => 'Please enter name',
            'body.required' => 'Please enter body',
            'tags.required' => 'Please enter tag'
        ];
    }
}
