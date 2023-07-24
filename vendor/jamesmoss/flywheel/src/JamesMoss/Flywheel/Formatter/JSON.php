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
        $options = JSON_UNESCAPED_UNICODE; /*defined('JSON_PRETTY_PRINT') ? JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE : null;*/ // modified by C3La-NS

        return json_encode($data, $options);
    }

    public function decode($data)
    {
        return json_decode($data);
    }
}