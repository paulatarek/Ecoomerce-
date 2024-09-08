<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDesignRequest extends FormRequest
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

     public function oncreate()
     {
        return [
            'name' => 'required|min:4|',
            'email'=>'required|email|unique:users,email,',
            'password'=>'required|min:8|confirmed',
            'phone'=>'required|numeric|unique:admins,phone|regex:/(01)[0-9]{9}/'
        ];
     }
     public function onubdate()
     {
        return [
            //
        ];
     }
    public function rules()
    {
       return request()->isMethod('put') || request()->isMethod('patch') ? $this->onubdate() : $this->oncreate();
    }
}
