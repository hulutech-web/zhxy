<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolRequest extends FormRequest
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
            'name' => ['required', 'min:3', Rule::unique('schools')->ignore(request('school'))],
            'domain' => ['required', 'url'],
            'tel' => ['required'],
            'email' => ['required']
        ];
    }
    public function attributes()
    {
        return [
            'domain' => '站点域名',
            'name' => '学校名称',
            'tel' => '对公电话',
            'email' => '电子邮箱',
            'rate' => '评分'
        ];
    }
}
