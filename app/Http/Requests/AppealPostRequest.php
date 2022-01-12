<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Enums\Enums;

class AppealPostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:20'],
            'surname' => ['required', 'string', 'max:40'],
            'patronymic' => ['nullable', 'string', 'max:20'],
            'phone' => [
                'nullable',
                'required_without:email',
                'string',
                function ($attribute, $value, $fail) {
                    $attribute = $this->attributes()[$attribute];
                    $value = str_replace(['(', ')', ' ', '-'], '', $value);
                    if (!preg_match('/^(8|7|(\+7)){1}\d{10}/$', $value))
                        return $fail($attribute . ' не соответствует формату российского телефона');
                },
            ],
            'email' => ['nullable', 'required_without:phone', 'string', 'max:100', 'email:rfc,dns'],
            'age' => ['required', 'numeric', 'between:14, 125'],
            'gender' => ['required', Rule::in(array_keys(Enums::Gender))],
            'message' => ['required', 'string', 'max:100'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'phone' => 'Телефон',
            'age' => 'Возраст',
            'gender' => 'Пол',
            'email' => 'Email',
            'message' => 'Сообщение',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Пропущено обязательное поле :attribute',
            'max' => ':attribute не должен превышать :max символов',
            'between' => ':attribute не попадает должен быть от :min до :max',
            'in' => ':attribute должен быть один из :values',
            'regex' => ':attribute имеет неверный формат',
            'email' => ':attribute не является действительным',
            'phone.required_without' => 'Заполните одно из полей контактов',
            'email.required_without' => 'Заполните одно из полей контактов',
        ];
    }
}
