<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        if($this->method() == 'PATCH'){
            return [
                'name' => 'required|unique:products,name,'.$this->id,
                'description' => 'required'
            ];
        }else{
            return [
                'name' => 'required|unique:products,name',
                'description' => 'required'
            ];
        }
    }

    public function messages(){
        return [
            'name.required' => 'Please Enter Name',
            'name.unique' => 'Name Is Already Registered, Please Use Another !',
            'description.required' => 'Please Enter Description'
        ];
    }
}