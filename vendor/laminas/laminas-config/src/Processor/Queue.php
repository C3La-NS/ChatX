<?php

namespace Laminas\Config\Processor;

use Laminas\Config\Config;
use Laminas\Config\Exception;
use Laminas\Stdlib\PriorityQueue;

class Queue extends PriorityQueue implements ProcessorInterface
{
    /**
     * Process the whole config structure with each parser in the queue.
     *
     * @return Config
     * @throws Exception\InvalidArgumentException
     */
    public function process(Config $config)
    {
        if ($config->isReadOnly()) {
            throw new Exception\InvalidArgumentException('Cannot process config because it is read-only');
        }

        foreach ($this as $parser) {
            /** @var ProcessorInterface $parser */
            $parser->process($config);
        }

        return $config;
    }

    /**
     * Process a single value
     *
     * @param  mixed $value
     * @return mixed
     */
    public function processValue($value)
    {
        foreach ($this as $parser) {
            /** @var ProcessorInterface $parser */
            $value = $parser->processValue($value);
        }

        return $value;
    }
}
