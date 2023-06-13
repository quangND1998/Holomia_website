<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectHolo360Request extends FormRequest
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
    public function rules()
    {
        return [
            'title'=> 'required|unique:holo360_project,title,',
           'link' => 'required',
           'type' => 'required',
           'image' => ['required_if:can_upload_file,true','nullable','mimes:jpeg,jpg,png'],
           'category_holo360_id' => 'required',
     

        ];
    }
}
