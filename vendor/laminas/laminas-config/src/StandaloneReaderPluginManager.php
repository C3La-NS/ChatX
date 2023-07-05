<?php

namespace Laminas\Config;

use Psr\Container\ContainerInterface;

use function array_keys;
use function array_values;
use function class_exists;
use function in_array;
use function sprintf;
use function strtolower;

class StandaloneReaderPluginManager implements ContainerInterface
{
    /** @var array<string, class-string> */
    private $knownPlugins = [
        'ini'            => Reader\Ini::class,
        'json'           => Reader\Json::class,
        'xml'            => Reader\Xml::class,
        'yaml'           => Reader\Yaml::class,
        'javaproperties' => Reader\JavaProperties::class,
    ];

    /**
     * @param string $plugin
     * @return bool
     */
    public function has($plugin)
    {
        if (in_array($plugin, array_values($this->knownPlugins), true)) {
            return true;
        }

        return in_array(strtolower($plugin), array_keys($this->knownPlugins), true);
    }

    /**
     * @param string $plugin
     * @return Reader\ReaderInterface
     * @throws Exception\PluginNotFoundException
     */
    public function get($plugin)
    {
        if (! $this->has($plugin)) {
            throw new Exception\PluginNotFoundException(sprintf(
                'Config reader plugin by name %s not found',
                $plugin
            ));
        }

        if (! class_exists($plugin)) {
            $plugin = $this->knownPlugins[strtolower($plugin)];
        }

        return new $plugin();
    }
}
