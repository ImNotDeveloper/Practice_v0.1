<?php

namespace practice;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class PracticeLoader extends PluginBase
{

    private static $instance;

    /**
     * @var Config
     */
    public $config;

    public function onLoad()
    {
        self::$instance = $this;
    }

    public function onEnable()
    {
        $this->getLogger()->notice("Plugin loading correctly!");

        @mkdir($this->getDataFolder());

        $this->config = new Config($this->getDataFolder() . 'Config.yml', Config::YAML);
        $this->config->save();
    }

    public static function getInstance(): PracticeLoader
    {
        return self::$instance;
    }
}