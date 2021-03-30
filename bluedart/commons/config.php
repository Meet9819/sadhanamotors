<?php

namespace BlueDart\Commons\Config;

class ConfigHandler
{
    public $config;

    public function __construct()
    {
        // load config file
        $this->config = parse_ini_file(__DIR__. DIRECTORY_SEPARATOR . "../configs/config.ini.php", true);
    }
}
