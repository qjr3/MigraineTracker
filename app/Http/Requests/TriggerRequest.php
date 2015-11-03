<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TriggerRequest extends Request
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
        return 
        [
            'name' => 'required', // given a default value in the migration/db so doesn't need to be required in laravel.
        ];
    }
}
