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
                'category_id' => 'required',
                'name' => 'required|unique:products,name,'.$this->id,
                'description' => 'required'
            ];
        }else{
            return [
                'category_id' => 'required',
                'name' => 'required|unique:products,name',
                'description' => 'required'
            ];
        }
    }

    public function messages(){
        return [
            'category_id.required' => 'Please select category',
            'name.required' => 'Please enter name',
            'name.unique' => 'Name is already registered, Please use another name',
            'description.required' => 'Please enter description'
        ];
    }
}
