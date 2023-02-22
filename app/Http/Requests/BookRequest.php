<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'book_name' => 'required',
            'book_title' => 'required',
            'subject_name' => 'required',
            'language' => 'required',
            'status' => 'required',
            'numberOfPages' => 'required',
            'publish_date' => 'required',
            'total_copy' => 'required',
            'author_id' => 'required',
            'publishers_id' => 'required',
            'category_id' => 'required',
            'image' => 'required | image'
        ];
    }
}
