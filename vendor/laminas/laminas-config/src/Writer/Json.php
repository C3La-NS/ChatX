<?php

namespace Laminas\Config\Writer;

use Laminas\Config\Exception;

use function json_encode;
use function json_last_error_msg;

use const JSON_PRETTY_PRINT;
use const JSON_UNESCAPED_SLASHES;

class Json extends AbstractWriter
{
    /**
     * processConfig(): defined by AbstractWriter.
     *
     * @param  array $config
     * @return string
     * @throws Exception\RuntimeException If encoding errors occur.
     */
    public function processConfig(array $config)
    {
        $serialized = json_encode($config, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);

        if (false === $serialized) {
            throw new Exception\RuntimeException(json_last_error_msg());
        }

        return $serialized;
    }
}
