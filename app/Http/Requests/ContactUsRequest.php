<?php

    namespace App\Http\Requests;

    use Illuminate\Foundation\Http\FormRequest;

    class ContactUsRequest extends FormRequest{
        public function authorize(){
            return true;
        }

        public function rules(){
            return [
                'name' => 'required',
                'email' => 'required|email|unique:contact_us,email',
                'phone' => 'required|numeric|digits:10|unique:contact_us,phone',
                'subject' => 'required',
                'message' => 'required'
            ];
        }

        public function messages(){
            return [
                'name.required' => 'Please enter name',
                'email.required' => 'Please enter email address',
                'email.email' => 'Please enter valid email address',
                'email.unique' => 'Please enter valid email address, this email address already used',
                'phone.required' => 'Please enter phone number',
                'phone.numeric' => 'Please enter valid phone number',
                'phone.unique' => 'Please enter valid phone number, this  phone number already used',
                'phone.digits' => ' Phone number must be 10 digits only',
                'subject.required' => 'Please enter subject',
                'message.required' => 'Please enter message'
            ];
        }
    }