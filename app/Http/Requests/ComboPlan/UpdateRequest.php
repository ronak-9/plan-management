<?php

namespace App\Http\Requests\ComboPlan;

use App\Traits\ValidationExceptionHandler;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    use ValidationExceptionHandler;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['bail','required','string','max:255','unique:combo_plans,name,'.$this->route('id')],
            'price' => ['bail','required','numeric','max:99999999.99'],
            'plans' => ['bail', 'required', 'array'],
            'plans.*' => ['bail', 'exists:plans,id'],
        ];
    }
}
