<?php

namespace EpicCase\Canceled;

use pocketmine\Player;

use pocketmine\scheduler\PluginTask;

use pocketmine\item\Item;

use EpicCase\ACase;

class Cancel extends PluginTask {
    
    public $time = 2;   
    
	public function __construct(ACase $plugin, Player $player){
		$this->plugin = $plugin;
        $this->player = $player;
		parent::__construct($plugin);
	}
      
	public function onRun($timer){ 
        $player = $this->player;
        $type = $this->plugin->type[$player->getName()][0];
        if($this->time > 0){
           $this->time--;
        }
        
        if($this->time == 1){
           $caixa = Item::get(146, 0, 1);
           $caixa->setCustomName("§l§cCaixa §r§7". $type);
           $player->getInventory()->addItem($caixa);
        }

        if($this->time <= 0){
           $this->getOwner()->getServer()->getScheduler()->cancelTask($this->getTaskId());
        }         
    }
}