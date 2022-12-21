<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDocumentsRequest extends FormRequest
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
                'userId' => ['required'],
                'filename' => ['required'],
                'extension' => ['required', Rule::in(['jpeg', 'pdf'])],
                'type' => ['required', Rule::in(['jpeg', 'pdf'])]
            ];
        } else {
            return [
                'userId' => ['sometimes','required'],
                'filename' => ['sometimes','required'],
                'extension' => ['sometimes','required', Rule::in(['jpeg', 'pdf'])],
                'type' => ['sometimes','required', Rule::in(['jpeg', 'pdf'])]
            ];
        }
    }

    protected function prepareForValidation()
    {
        if ($this->userId) {
            $this->merge([
                'user_id' => $this->userId
            ]);
        }

    }
}
