<?php

namespace Laminas\Config\Processor;

use Laminas\Config\Config;
use Laminas\Config\Exception;
use Laminas\I18n\Translator\Translator as LaminasTranslator;

class Translator implements ProcessorInterface
{
    /** @var LaminasTranslator */
    protected $translator;

    /** @var string|null */
    protected $locale;

    /** @var string */
    protected $textDomain = 'default';

    /**
     * Translator uses the supplied Laminas\I18n\Translator\Translator to find
     * and translate language strings in config.
     *
     * @param string $textDomain
     * @param string|null $locale
     */
    public function __construct(LaminasTranslator $translator, $textDomain = 'default', $locale = null)
    {
        $this->setTranslator($translator);
        $this->setTextDomain($textDomain);
        $this->setLocale($locale);
    }

    /**
     * @return self
     */
    public function setTranslator(LaminasTranslator $translator)
    {
        $this->translator = $translator;
        return $this;
    }

    /**
     * @return LaminasTranslator
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * @param string|null $locale
     * @return self
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $textDomain
     * @return self
     */
    public function setTextDomain($textDomain)
    {
        $this->textDomain = $textDomain;
        return $this;
    }

    /**
     * @return string
     */
    public function getTextDomain()
    {
        return $this->textDomain;
    }

    /**
     * Process
     *
     * @return Config
     * @throws Exception\InvalidArgumentException
     */
    public function process(Config $config)
    {
        if ($config->isReadOnly()) {
            throw new Exception\InvalidArgumentException('Cannot process config because it is read-only');
        }

        /**
         * Walk through config and replace values
         */
        foreach ($config as $key => $val) {
            if ($val instanceof Config) {
                $this->process($val);
            } else {
                $config->{$key} = $this->translator->translate($val, $this->textDomain, $this->locale);
            }
        }

        return $config;
    }

    /**
     * Process a single value
     *
     * @param string $value
     * @return string
     */
    public function processValue($value)
    {
        return $this->translator->translate($value, $this->textDomain, $this->locale);
    }
}
