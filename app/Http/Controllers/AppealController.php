<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Http\Request;

class AppealController extends Controller
{
    public function __invoke(Request $request)
    {
        $errors = [];
        $success = $request->session()->get('success', false);

        if ($request->isMethod('post')) {
            $name = $request->input('name');
            $phone = $request->input('phone');
            $email = $request->input('email');
            $message = $request->input('message');

            if (!$name)
                $errors['name'] = 'Введите имя';
            else if (strlen($name) > 20)
                $errors['name'] = 'Имя слишком длинное, максимум 20 символов';

            if (!$phone && !$email)
                $errors['contacts'] = 'Заполните хотя бы одно поле контактов';
            if (strlen($email) > 100)
                $errors['email'] = 'Email слишком длинный, максимум 100 символов';
            if ($phone !== null && strlen($phone) !== 11)
                $errors['phone'] = 'Кажется телефон введен не правильно, максимум 11 символов';

            if (!$message)
                $errors['message'] = 'Введите сообщение';
            else if (strlen($message) > 100)
                $errors['message'] = 'Сообщение слишком длинное, максимум 100 символов';

            if (count($errors) === 0) {
                $appeal = new Appeal();
                $appeal->name = $name;
                $appeal->phone = $phone;
                $appeal->email = $email;
                $appeal->message = $message;
                $appeal->save();

                return redirect()
                    ->route('appeal')
                    ->with('success', $success);
            } else {
                $request->flash();
            }
        }

        return view('appeal.appeal', ['success' => $success, 'errors' => $errors]);
    }
}
