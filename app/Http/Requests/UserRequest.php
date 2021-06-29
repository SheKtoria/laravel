<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends Request
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
            'number'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|max:11',
            'firstName' => 'required|string|min:1|max:15',
            'lastName'  => 'required|string|min:1|max:15',
            'address'   => 'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
        ];
    }
}
