<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditTicketRequest extends Request
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
            'subject' => 'required|min:6',
            'content' => "required|min:50",
            'department_id' => 'required|exists:departments,id',
            'priority_id' => 'required|exists:priorities,id',
        ];
    }
}
