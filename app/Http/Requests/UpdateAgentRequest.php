<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAgentRequest extends FormRequest
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
        $rules = User::$agentRules;
        $rules['username'] = 'required|unique:users,username,'.$this->id;
        $rules['email'] = 'required|unique:users,email,'.$this->id;
        $rules['password'] = 'nullable';

        return $rules;
    }
}
