<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        // dd(request()->segment(2));

        // dd(request()->segment(3));
        return [
            //


            'name'=>'required|min:5',
            'email'=>'required|email|unique:admins,email,'. request()->segment(3).',id' ,
            'password'=>'required|min:8|confirmed',
            'phone'=>'required|numeric|unique:admins,phone,'. request()->segment(3).',id',
            'gender'=>'required|',
            'status'=>'required|',
            'image'=>'mimes:png,jpg,gif|max:1000|nullable',
        ];
    }
}
