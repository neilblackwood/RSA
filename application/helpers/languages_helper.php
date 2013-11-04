<?php

function available_languages()
{
    $languages = array_filter(glob('application/language/*'), 'is_dir');

    foreach ($languages as $index=>$language)
    {
        $languages[$index] = substr($language, strripos($language, '/')+1);
    }

    return $languages;
}