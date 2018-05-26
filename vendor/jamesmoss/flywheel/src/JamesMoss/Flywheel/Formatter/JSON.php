<?php

namespace JamesMoss\Flywheel\Formatter;

class JSON implements FormatInterface
{
    public function getFileExtension()
    {
        return 'json';
    }

    public function encode(array $data)
    {
        $options = defined('JSON_PRETTY_PRINT') ? JSON_PRETTY_PRINT : null;

        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function decode($data)
    {
        return json_decode($data);
    }
}