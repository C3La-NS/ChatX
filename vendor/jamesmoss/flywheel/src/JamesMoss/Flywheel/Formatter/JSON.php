<?php

namespace JamesMoss\Flywheel\Formatter;

class JSON implements Format
{
    public function getFileExtension()
    {
        return 'json';
    }

    public function encode(array $data)
    {
        $options = defined('JSON_PRETTY_PRINT') ? JSON_PRETTY_PRINT : null;

        return json_encode($data, JSON_UNESCAPED_UNICODE); // originally was $options but to make cyrillic look nice had to replace it with JSON_UNESCAPED_UNICODE, soz
    }

    public function decode($data)
    {
        return json_decode($data);
    }
}