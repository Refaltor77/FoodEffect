<?php

namespace FoodEffect;

use FoodEffect\event\FoodEffect;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\utils\Config;

class Main extends PluginBase
{
    /** @var Main  */
    private static $food;

    /** @var Config */
    public $config;

    public static function getMain(): Main{
    return self::$food;
    }

    public function onLoad(){
    @mkdir($this->getDataFolder() . "data/");
    }

    public function onEnable(){
    self::$food = $this;
    $this->saveDefaultConfig();
    Server::getInstance()->getPluginManager()->registerEvents(new FoodEffect(), $this);
    }
}
