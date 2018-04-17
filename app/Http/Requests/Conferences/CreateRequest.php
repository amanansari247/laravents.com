<?php

namespace App\Http\Requests\Conferences;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => 'required|string',
            'website' => 'required|url',
            'description' => 'required|string',
            'ticket_url' => 'sometimes|url',
            'header_image' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }
}
