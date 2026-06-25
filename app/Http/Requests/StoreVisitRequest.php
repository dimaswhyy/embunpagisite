<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVisitRequest extends FormRequest
{
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
            'child_name' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            // 'school_from' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'visit_date' => 'required|date',
            'visit_time' => 'required|date_format:H:i',
            'purpose_to_empty' => 'nullable|in:',
        ];
    }

    /**
     * Error messages
     */
    public function messages(): array
    {
        return [
            'child_name.required' => 'The child name field is required.',
            'parent_name.required' => 'The parent name field is required.',
            'phone.required' => 'The phone field is required.',
            'phone.max' => 'The phone number must not exceed 20 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'school_from.required' => 'The name of school field is required.',
            'program.required' => 'The program field is required.',
            'visit_date.required' => 'The visit date field is required.',
            'visit_date.date' => 'Please enter a valid date for the visit.',
            'visit_time.required' => 'The visit time field is required.',
        ];
    }
}
