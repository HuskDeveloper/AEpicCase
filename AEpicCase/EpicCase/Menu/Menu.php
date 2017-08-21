<?php

namespace EpicCase\Menu;

use pocketmine\Player;

use pocketmine\scheduler\PluginTask;

use pocketmine\item\Item;

class Menu extends PluginTask {
    
    public $time = 2;   
    
	public function __construct(ACase $plugin, $chest){
		$this->plugin = $plugin;
        $this->chest = $chest;
		parent::__construct($plugin);
	}
      
	public function onRun($timer){ 
        $chest = $this->chest;
        if($this->time > 0){
           $this->time--;
        }
        
        if($this->time == 1){
           $green = Item::get(159, 13, 1);
           $red = Item::get(159, 14, 1);    
        
           $green->setCustomName("§l§aAbrir");
           $red->setCustomName("§l§cFechar");
           $chest->setItem(11, $green);
           $chest->setItem(15, $red);
        }

        if($this->time <= 0){
           $this->getOwner()->getServer()->getScheduler()->cancelTask($this->getTaskId());
        }         
    }
}  