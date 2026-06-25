<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyFormRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'job.0.company' => 'required|string|max:255',
            'job.0.position' => 'required|string|max:255',
            'job.0.start_date' => 'required|date',
            'job.0.end_date' => 'required|date',
            // 'job.*.start_date' => 'before_or_equal:job.*.end_date',
            // 'job.*.end_date' => 'after_or_equal:job.*.start_date',
            'education.0.level' => 'required|string|max:100',
            'education.0.institution' => 'required|string|max:100',
            'education.0.major' => 'required|string|max:100',
            'english_proficiency' => 'required',
            'latest_salary' => 'required|integer',
            'salary_expectation' => 'required|integer',
            'agree' => 'required',
            'purpose_to_empty' => 'nullable|in:',
        ];
    }

    /**
     * Error messages
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.string' => 'First name must be a valid string.',
            'first_name.max' => 'First name cannot exceed 255 characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.string' => 'Last name must be a valid string.',
            'last_name.max' => 'Last name cannot exceed 255 characters.',

            'phone.required' => 'Phone number is required.',
            'phone.string' => 'Phone number must be a valid string.',
            'phone.max' => 'Phone number cannot exceed 20 characters.',

            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email address cannot exceed 255 characters.',

            'address.required' => 'Address is required.',
            'address.string' => 'Address must be a valid string.',
            'address.max' => 'Address cannot exceed 500 characters.',

            'job.*.company.required' => 'Job company name is required.',
            'job.*.company.string' => 'Job company name must be a valid string.',
            'job.*.company.max' => 'Job company name cannot exceed 100 characters.',

            'job.*.position.required' => 'Job position is required.',
            'job.*.position.string' => 'Job position must be a valid string.',
            'job.*.position.max' => 'Job position cannot exceed 100 characters.',

            'job.*.start_date.required' => 'Job start date is required.',
            'job.*.start_date.string' => 'Job start date must be a valid string.',
            'job.*.start_date.max' => 'Job start date cannot exceed 100 characters.',

            'job.*.end_date.required' => 'Job end date is required.',
            'job.*.end_date.string' => 'Job end date must be a valid string.',
            'job.*.end_date.max' => 'Job end date cannot exceed 100 characters.',

            'job.*.start_date.before_or_equal' => 'The start date must be before or equal to the end date.',
            'job.*.end_date.after_or_equal' => 'The end date must be after or equal to the start date.',

            'education.*.level.required' => 'Education level is required.',
            'education.*.level.string' => 'Education level must be a valid string.',
            'education.*.level.max' => 'Education level cannot exceed 100 characters.',

            'education.*.institution.required' => 'Education institution is required.',
            'education.*.institution.string' => 'Education institution must be a valid string.',
            'education.*.institution.max' => 'Education institution cannot exceed 100 characters.',

            'education.*.major.required' => 'Education major is required.',
            'education.*.major.string' => 'Education major must be a valid string.',
            'education.*.major.max' => 'Education major cannot exceed 100 characters.',

            'english_proficiency.required' => 'English proficiency level is required.',

            'latest_salary.required' => 'Latest salary is required.',
            'latest_salary.integer' => 'Latest salary must be a valid integer.',

            'salary_expectation.required' => 'Salary expectation is required.',
            'salary_expectation.integer' => 'Salary expectation must be a valid integer.',

            'agree.required' => 'You must agree to the terms and conditions.',

            'purpose_to_empty.in' => 'Spam detected.',
        ];
    }
}
