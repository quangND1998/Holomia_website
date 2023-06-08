<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectHolo360Request extends FormRequest
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
            'title' => [
                'required',
                Rule::unique('holo360_project', 'title')->ignore($this->project)
            ],
            'link' => 
                'required',
              
            'image'=>'nullable|mimes:png,jpg,jpeg',
            'category_holo360_id' => 'required',
 
          
        ];
    }
}
