<?php

namespace App\Http\Requests\City;

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
    public function rules(): array
    {
        if($this->isMethod("GET")) {
            return $this->listValidate();
        } else if($this->isMethod("POST")) {
            return $this->storeValidate();
        } else if($this->isMethod("PUT")) {
            return $this->updateValidate();
        }
        return [];
    }

    private function listValidate(): array
    {
        return [];
    }

    private function storeValidate(): array
    {
        return [
            'state_id' => "required",
            'name' => "required",
            'status' => "required|in:active,in_active"
        ];
    }
    
    private function updateValidate(): array
    {
        return [
            'state_id' => "required",
            'name' => "required",
            'status' => "required|in:active,in_active"
        ];
    }
}
