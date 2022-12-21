<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsersRequest extends FormRequest
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
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'name' => ['required'],
                'lastname' => ['required'],
                'email' => ['required', 'email'],
                'username' => ['required', 'min:6'],
                'password' => ['required'],
                'isAdmin' => ['required', Rule::in(['1','0'])],
                'isActive' => ['required', Rule::in(['1','0'])]
            ];
        } else {
            return [
                'name' => ['sometimes','required'],
                'lastname' => ['sometimes','required'],
                'email' => ['sometimes','required', 'email'],
                'username' => ['sometimes','required', 'min:6'],
                'password' => ['sometimes','required'],
                'isAdmin' => ['sometimes','required', Rule::in(['1','0'])],
                'isActive' => ['sometimes','required', Rule::in(['1','0'])]
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->isAdmin) {
            $this->merge([
                'is_admin' => $this->isAdmin
            ]);
        }

        if ($this->isActive) {
            $this->merge([
                'is_active' => $this->isActive
            ]);
        }

    }
}
