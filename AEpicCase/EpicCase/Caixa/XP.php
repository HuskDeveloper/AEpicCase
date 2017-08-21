<?php

namespace EpicCase\Caixa;

use pocketmine\Player;

use pocketmine\scheduler\PluginTask;

use pocketmine\item\Item;
use pocketmine\block\Block;

use pocketmine\item\enchantment\Enchantment;

use pocketmine\level\sound\ClickSound;

use EpicCase\ACase;

class XP extends PluginTask {
    
    public $time = 150;
    
	public function __construct(ACase $plugin, Player $player, $chest){
		$this->plugin = $plugin;
        $this->player = $player;
        $this->chest = $chest;
		parent::__construct($plugin);
	}
    
    public function setItem($index, int $id, $count, $dmg){
       
    #index = 9, 10, 11, 12, 13, 14, 15, 16, 17
    #index = 12, 13, 14
        
    $this->plugin->pegar = false;    
        
    $chest = $this->chest;
       
    $item = Item::get($id);
    $item->setDamage($dmg);
    $item->setCount($count);
        
    /** Clay */    
    if($id == 159){
        
    $damage = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17);
        
    $item->setDamage($damage[mt_rand(0, count($damage)-1)]);
    $item->setCount(1);    
    }
    
    /** XP */
    if($id == 384){
    
    $item->setCount(rand(1, 64));
        
    }
    $chest->setItem($index, $item);
    }
  
	public function onRun($timer){ 
        
    $this->player->getLevel()->addSound(new ClickSound($this->player), $this->player->getLevel()->getPlayers());       
    
    $this->setItem(0,159,1,0);
    $this->setItem(1,159,1,0);
    $this->setItem(2,159,1,0);
    $this->setItem(3,159,1,0);
    $this->setItem(4,159,1,0);
    $this->setItem(5,159,1,0);
    $this->setItem(6,159,1,0);
    $this->setItem(7,159,1,0);
    $this->setItem(8,159,1,0);
    $this->setItem(18,159,1,0);
    $this->setItem(19,159,1,0);
    $this->setItem(20,159,1,0);
    $this->setItem(21,159,1,0);
    $this->setItem(22,159,1,0);
    $this->setItem(23,159,1,0);
    $this->setItem(24,159,1,0);
    $this->setItem(25,159,1,0);
    $this->setItem(26,159,1,0);
    $this->setItem(27,159,1,0);
        
    if($this->time > 0){
    $this->time--;
    }
        
    if($this->time == 149){
        
    $this->setItem(9,384,1,0);
    $this->setItem(10,384,1,0);    
    $this->setItem(11,384,1,0);    
    $this->setItem(12,384,1,0);    
    $this->setItem(13,384,1,0);    
    $this->setItem(14,384,1,0);    
    $this->setItem(15,384,1,0);    
    $this->setItem(16,384,1,0);    
    $this->setItem(17,384,1,0);    
            
    }
                                                
    if($this->time == 125){
        
    $this->setItem(9,384,1,0);
    $this->setItem(10,384,1,0);    
    $this->setItem(11,384,1,0);    
    $this->setItem(12,384,1,0);    
    $this->setItem(13,384,1,0);    
    $this->setItem(14,384,1,0);    
    $this->setItem(15,384,1,0);    
    $this->setItem(16,384,1,0);    
    $this->setItem(17,384,1,0);   
        
    }
    
    if($this->time == 100){
        
    $this->setItem(9,384,1,0);
    $this->setItem(10,384,1,0);    
    $this->setItem(11,384,1,0);    
    $this->setItem(12,384,1,0);    
    $this->setItem(13,384,1,0);    
    $this->setItem(14,384,1,0);    
    $this->setItem(15,384,1,0);    
    $this->setItem(16,384,1,0);    
    $this->setItem(17,384,1,0);   

    }
    
    if($this->time == 75){
        
    $this->setItem(9,384,1,0);
    $this->setItem(10,384,1,0);    
    $this->setItem(11,384,1,0);    
    $this->setItem(12,384,1,0);    
    $this->setItem(13,384,1,0);    
    $this->setItem(14,384,1,0);    
    $this->setItem(15,384,1,0);    
    $this->setItem(16,384,1,0);    
    $this->setItem(17,384,1,0);   

    }
        
    if($this->time == 50){
        
    $this->setItem(9,384,1,0);
    $this->setItem(10,384,1,0);    
    $this->setItem(11,384,1,0);    
    $this->setItem(12,384,1,0);    
    $this->setItem(13,384,1,0);    
    $this->setItem(14,384,1,0);    
    $this->setItem(15,384,1,0);    
    $this->setItem(16,384,1,0);    
    $this->setItem(17,384,1,0);     
        
    }
    
    if($this->time == 25){
        
    $this->setItem(9,384,1,0);
    $this->setItem(10,384,1,0);    
    $this->setItem(11,384,1,0);    
    $this->setItem(12,384,1,0);    
    $this->setItem(13,384,1,0);    
    $this->setItem(14,384,1,0);    
    $this->setItem(15,384,1,0);    
    $this->setItem(16,384,1,0);    
    $this->setItem(17,384,1,0);   

    }
    
    if($this->time <= 0){
        
    $this->setItem(0,0,1,0);
    $this->setItem(1,0,1,0);
    $this->setItem(2,0,1,0);
    $this->setItem(3,0,1,0);
    $this->setItem(4,0,1,0);
    $this->setItem(5,0,1,0);
    $this->setItem(6,0,1,0);
    $this->setItem(7,0,1,0);
    $this->setItem(8,0,1,0);
    $this->setItem(9,0,1,0);
    $this->setItem(10,0,1,0);
    $this->setItem(11,0,1,0);
    $this->setItem(15,0,1,0);
    $this->setItem(16,0,1,0);
    $this->setItem(17,0,1,0);
    $this->setItem(18,0,1,0);
    $this->setItem(19,0,1,0);
    $this->setItem(20,0,1,0);
    $this->setItem(21,0,1,0);
    $this->setItem(22,0,1,0);
    $this->setItem(23,0,1,0);
    $this->setItem(24,0,1,0);
    $this->setItem(25,0,1,0);
    $this->setItem(26,0,1,0);
    $this->setItem(27,0,1,0);
        
    $this->plugin->unSet($this->player);
    $this->getOwner()->getServer()->getScheduler()->cancelTask($this->getTaskId());
    }
  }
}        