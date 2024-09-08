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
     * @return array<string, mixed>
     */
    protected function oncreate()
    {
        return [
            'name' => 'required|string|min:2',
            'desc' => 'required|string|min:20',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'image.*' => 'required|mimes:png,jpg,gif|max:5000',
        ];
    }
    protected function onupdate()
    {
        return [
            'name' => 'required|string|min:2',
            'desc' => 'required|string|min:20',
            'price' => 'required|numeric',
            'qty' => 'required|numeric',
            'image'=>'required',
            'image.*' => 'mimes:png,jpg,gif|max:5000',
        ];
    }
    public function rules()
    {
        return request()->isMethod('put')||request()->isMethod('batch') ? $this->oncreate() : $this->onupdate();


    }
    public function messages()
    {
        return[
            'image.required' => 'this input requierd',
            'image.*.image' => 'not support',
        ];
    }


}
