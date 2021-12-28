<?php

namespace App\Sanitizers;

use App\Http\Controllers\Enums\Enums;

class AppealSanitizer
{
    public static function sanitize(array $values): array
    {
        if (isset($values['phone'])) {
            $values['phone'] = TrimPhone::handle($values['phone']);
        }

        if (isset($values['gender'])) {
            $values['gender'] = Enums::Gender[$values['gender']];
        }

        return $values;
    }
}
