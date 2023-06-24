<?php

namespace App\Http\Requests;

use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $blogId = $this->route('blog');

        return [
            'name' => [
                'required',
                //'unique:blogs,name',
                Rule::unique('blogs')->ignore($blogId),
                'max:255',
                'min:4'
            ],
            'display_name' => 'required|max:255',
            'description' => 'required|max:50',
        ];
    }
}
