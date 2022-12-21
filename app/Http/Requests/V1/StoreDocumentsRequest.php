<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDocumentsRequest extends FormRequest
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
            'userId' => ['required'],
            'filename' => ['required'],
            'extension' => ['required', Rule::in(['jpeg', 'pdf'])],
            'type' => ['required', Rule::in(['jpeg', 'pdf'])]
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'user_id' => $this->userId
        ]);
    }
}
