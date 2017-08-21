<?php

namespace EpicCase\Canceled;

use pocketmine\Player;

use pocketmine\scheduler\PluginTask;

use pocketmine\item\Item;

use EpicCase\ACase;

class Closed extends PluginTask {
    
    public $time = 3;   
    
	public function __construct(ACase $plugin, Player $player, $chest){
		$this->plugin = $plugin;
        $this->chest = $chest;
        $this->player = $player;
		parent::__construct($plugin);
	}
      
	public function onRun($timer){ 
        $chest = $this->chest;
        $player = $this->player;
        if($this->time > 0){
           $this->time--;
        }
        
        if($this->time == 1){
           $player->getInventory()->addItem($chest->getItem(13));
        }

        if($this->time <= 0){
           $this->getOwner()->getServer()->getScheduler()->cancelTask($this->getTaskId());
        }         
    }
}