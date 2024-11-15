<?php

namespace App\Http\Requests\EligibilityCriteria;

use App\Traits\ValidationExceptionHandler;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => ['bail', 'required', 'string', 'max:255','unique:eligibility_criterias,name'],
            'age_greater_than' => ['bail','required' ,'integer', 'min:0','max:90'],
            'age_less_than' => ['bail', 'required' ,'integer', 'min:0','max:90','gte:age_greater_than'],
            'last_login_days_ago' => ['bail','required' ,'integer','max:36500'],
            'income_less_than' => ['bail','required' ,'numeric', 'min:0','gte:income_greater_than'],
            'income_greater_than' => ['bail','required' ,'numeric', 'min:0'],
        ];
    }
}
