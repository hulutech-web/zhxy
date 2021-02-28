<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
                'name' => ['required', 'min:2'],
                'email' => ['required', 'email'],
                'mobile' => ['required'],
                'password' => ['required'],
                'real_name' => ['required'],
                'CID' => ['required'],
                'attendance_num' => ['required'],
        ];
    }

    public function attributes() {
        return [
                'name' => '昵称',
                'real_name' => '真实姓名',
                'CID' => '身份证号',
                'mobile' => '电话',
                'email' => '电子邮箱',
                'attendance_num' => '门禁卡号',
        ];
    }
}
