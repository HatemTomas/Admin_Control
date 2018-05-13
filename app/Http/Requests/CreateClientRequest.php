<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'phone' => 'required|integer',
            'contract_start_date' => 'required',
            'contract_end_date' => 'required',
            'service' => 'required|array|in:facebook,twitter,youtube,instagram'
        ];
    }
}
