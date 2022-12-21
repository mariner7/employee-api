<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUsersRequest extends FormRequest
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
            'name' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'email'],
            'username' => ['required', 'min:6'],
            'password' => ['required'],
            'isAdmin' => ['required', Rule::in(['1','0'])],
            'isActive' => ['required', Rule::in(['1','0'])]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_admin' => $this->isAdmin,
            'is_active' => $this->isActive
        ]);
    }
}
