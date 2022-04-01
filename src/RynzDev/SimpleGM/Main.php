<?php

namespace RynzDev\SimpleGM;

use RynzDev\SimpleGM\commands\gms;
use RynzDev\SimpleGM\commands\gmc;
use RynzDev\SimpleGM\commands\gma;
use RynzDev\SimpleGM\commands\gmspc;
use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\tile\Tile;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\Server;
use pocketmine\player\Player;

class Main extends PluginBase {
    public $config;

    public function onEnable(): void {
        $this->getServer()->getCommandMap()->register("gms", new gms($this));
        $this->getServer()->getCommandMap()->register("gmc", new gmc($this));
        $this->getServer()->getCommandMap()->register("gma", new gma($this));
        $this->getServer()->getCommandMap()->register("gmspc", new gmspc($this));
    }
}