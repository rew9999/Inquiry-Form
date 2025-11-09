<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => 'required|string|max:255',
            'category_id' => 'required',
            'first_name' => 'required|string|max:255',
            'gender' => 'required|integer|in:1,2,3',
            'email' => 'required|email|max:255',
            'tel_part1' => 'required|numeric|max:5',
            'tel_part2' => 'required|numeric|max:5',
            'tel_part3' => 'required|numeric|max::5',
            'address' => 'required|string|max:255',
            'building' => 'nullable|string|max:255',
            'detail' => 'required|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'お問い合わせの種類を選択してください。',
            'last_name.required' => '姓を入力してください。',
            'first_name.required' => '名を入力してください。',
            'gender.required' => '性別を選択してください。',
            'gender.in' => '正しい性別を選択してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスはメール形式で入力してください。',
            'tel_part1.required' => '電話番号を入力してください。',
            'tel_part1.numeric' => '電話番号は半角英数字で入力してください。',
            'tel_part1.max' => '電話番号は5桁まで数字で入力してください',
            'tel_part2.required' => '電話番号を入力してください。',
            'tel_part2.numeric' => '電話番号は半角英数字で入力してください。',
            'tel_part2.max' => '電話番号は5桁まで数字で入力してください',
            'tel_part3.required' => '電話番号を入力してください。',
            'tel_part3.numeric' => '電話番号は半角英数字で入力してください。',
            'tel_part3.max' => '電話番号は5桁まで数字で入力してください',
            'address.required' => '住所を入力してください。',
            'detail.required' => 'お問い合わせ内容を入力してください。',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください'
        ];
    }

}
