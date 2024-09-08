<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatogryRequest extends FormRequest
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

     protected function onCreate()
     {
        return [
            'catogry_name'=>'required|min:4|string',
            'status'=>'required',
        ];
     }

     protected function onupdate()
     {
        return [
            'catogry_name'=>'required|min:4|string',
            'Status'=>'required|numeric',
        ];
     }

    public function rules()
    {
        return request()->isMethod('put')|| request()->isMethod('patch') ? $this->onupdate() : $this->onupdate() ;


    }
}
