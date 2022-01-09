<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|string',
            'email'     => ['required', 'string', 'max:100', Rule::unique('users')],
            'password'  => 'required|string|confirmed'
        ];
    }

    public function messages(){
        return [
            'required'                  => 'Trường :attribute là bắt buộc',
            'email.required'            => 'Bạn chưa điền email !',
            'email.unique'              => 'Email đã tồn tại',
            'phone.unique'              => 'Số điện thoại đã tồn tại',
            'max'                       => 'Độ dài tối đa là :max',
        ];
    }
}
