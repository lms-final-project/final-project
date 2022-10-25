<?php

namespace App\Http\Requests\Courses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
        return [
            'title'             => ['required' , 'string'],
            'description'       => ['required' , 'string'],
            'price'             => ['required_if:is_free,false'],
            'certification'     => ['required_if:has_certificate,true'],
            'course_type_id'    => ['required' , 'exists:course_types,id'],
            'category_id'       => ['required' , 'exists:categories,id'],
        ];
    }

    public function messages()
    {
        return [
            'course_type_id.required'   => "you must choose the course type",
            'category_id.required'      => "you must choose the course category"
        ];
    }
}
