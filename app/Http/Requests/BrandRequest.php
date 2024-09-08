<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name'=>'required|min:2|string',
            // 'status'=>'required',
        ];
     }

     protected function onUbdate()
     {
         return [
             'name'=>'required|min:2|string',
            //  'status'=>'required',
         ];
      }
    public function rules()
    {
        return request()->isMethod('put')|| request()->isMethod('patch') ? $this->onUbdate() : $this->onCreate() ;
    }
}
