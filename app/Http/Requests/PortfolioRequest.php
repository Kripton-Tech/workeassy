<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        if($this->method() == 'PATCH'){
            return [
                'category_id' => 'required',
                'title' => 'required|unique:portfolios,title,'.$this->id
            ];
        }else{
            return [
                'category_id' => 'required',
                'title' => 'required|unique:portfolios,title',
                'image' => 'required|mimes:jpg,jpeg,png'
            ];
        }
    }

    public function messages(){
        return [
            'category_id.required' => 'Please select category',
            'title.required' => 'Please enter title',
            'title.unique' => 'Please enter unique title',
            'image.required' => 'Please select image',
            'image.mimes' => 'Please select jpg, jpeg or png image'
        ];
    }
}
