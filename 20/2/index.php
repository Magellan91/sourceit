<?php
function languages()
{
    $languages = strtolower($_SERVER['HTTP_ACCEPT_LANGUAGE']);
    $languages = explode(',', $languages);
    $result = [];
    foreach ($languages as $key => &$value) {
        if (preg_match('/q/', $value, $arr)) {
            $temporary = explode(';q=', $value);
            $result[$temporary[1]] = $temporary[0];
        } else {
            $result['1'] = $value;
        }
    }
    foreach ($result as $key => $value) {
        if ($key <= 1) {
            if ($value == 'ru') {
                $lan = 'Вы используете русский';
                break;
            } else
                if ($value == 'en') {
                    $lan = 'You use English';
                    break;
                } else
                    if ($value == 'ua') {
                        $lan = 'Ви використовуєте Український';
                        break;
                    } else {
                        $lan = "You use English";
                    }
        }
    }
    return $lan;
}

echo languages();
