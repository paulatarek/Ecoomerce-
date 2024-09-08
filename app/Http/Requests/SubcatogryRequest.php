<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcatogryRequest extends FormRequest
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
        'name' => 'required|string',
        'image' => 'required|mimes:png,jpg,gif|max:5000',
       ];
    }

    protected function onupdate()
    {
       return [
        'name' => 'required|string',
        'image' => 'mimes:png,jpg,gif|max:5000',
       ];
    }
    public function rules()
    {
        return request()->isMethod('put')|| request()->isMethod('patch') ? $this->onupdate() : $this->onupdate() ;

    }
}
