<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Http\Request;
use App\Http\Controllers\Enums\Enums;

class AppealController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('appeal.appeal', ['genders' => Enums::Gender]);
        }

        $handler = new AppealPostRequest;

        $validated = $request->validate($handler->rules(), $handler->messages(), $handler->attributes());
        $sanitized = AppealSanitizer::sanitize($validated);

        $appeal = new Appeal();
        $appeal->name = $sanitized['name'];
        $appeal->surname = $sanitized['surname'];
        $appeal->patronymic = $sanitized['patronymic'];
        $appeal->phone = $sanitized['phone'];
        $appeal->email = $sanitized['email'];
        $appeal->age = $sanitized['age'];
        $appeal->gender = $sanitized['gender'];
        $appeal->message = $sanitized['message'];
        $appeal->save();

        return redirect()->route('appeal.appeal');
    }
}
