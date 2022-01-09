<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'name'              => ['required', 'max:100', Rule::unique('customers')->ignore($this->idCustomer  )],
            'email'             => ['required', 'max:100', Rule::unique('customers')->ignore($this->idCustomer  )],
            'phone'             => ['required', 'max:11', 'regex:/[0-9]{9}/', Rule::unique('customers')->ignore($this->idCustomer  )],
        ];
    }

    public function messages(){
        return [
            'required'                  => 'Trường :attribute là bắt buộc',
            'name.required'             => 'Bạn chưa điền tên khách hàng !',
            'email.required'            => 'Bạn chưa điền email khách hàng !',
            'name.unique'               => 'Tên khách hàng đã tồn tại!',
            'phone.required'            => 'Bạn chưa điền số điện thoại khách hàng !',
            'phone.regex'               => 'Số điện thoại khách hàng không hợp lệ!',
            'email.unique'              => 'Email đã tồn tại',
            'phone.unique'              => 'Số điện thoại đã tồn tại',
            'max'                       => 'Độ dài tối đa là :max',
        ];
    }
}
