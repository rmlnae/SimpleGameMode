<?php

namespace RynzDev\SimpleGM\commands;

use RynzDev\SimpleGM\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\lang\Translatable;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginOwned;
use pocketmine\utils\Config;
use pocketmine\Server;

class gmspc extends Command implements PluginOwned
{
    public function __construct(Main $plugin)
    {
        parent::__construct("gmspc", "Spectator Mode", null, []);
        $this->setPermission("gmspc.cmd");
        $this->plugin = $plugin;
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player){
            $sender->sendMessage("please run-ingame");
            return false;
        }        if (isset($args[0])) {
            $target = Server::getInstance()->getPlayerByPrefix($args[0]);
            if ($target instanceof Player) {
                $target->setGamemode(GameMode::SPECTATOR());
                $target->sendMessage("Your Gamemode Has Been Changed");
                $sender->sendMessage("You Updated Gamemode From The User");
            } else {
                $sender->sendMessage("Player Not Found!"));
            }
        } else {
            if(!$sender->hasPermission("gmspc.cmd")){
                $sender->sendMessage("§cYou Dont Have permissions To Use Command");
                return false;
            }
            $sender->setGamemode(GameMode::SPECTATOR());
            $sender->sendMessage("Your gamemode Has Been Changed To Spectator"));
        }
    }

    public function getOwningPlugin(): Plugin
    {
        return $this->plugin;
    }
}