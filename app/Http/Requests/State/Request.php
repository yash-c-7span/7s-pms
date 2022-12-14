<?php

namespace App\Http\Requests\State;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
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
        if($this->isMethod('GET')) {
            return $this->listValidation();
        } else if($this->isMethod('POST')) {
            return $this->storeValidation();
        } else if($this->isMethod('PUT')) {
            return $this->updateValidation();
        }

        return [];
    }

    private function listValidation()
    {
        return [];
    }

    private function storeValidation()
    {
        return [
            'name' => "required",
            'status' => "required|in:active,in_active"
        ];
    }

    private function updateValidation()
    {
        return [
            'name' => "required",
            'status' => "required|in:active,in_active"
        ];
    }
}
