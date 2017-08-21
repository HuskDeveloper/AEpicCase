<?php

namespace EpicCase\Caixa;

use pocketmine\Player;

use pocketmine\scheduler\PluginTask;

use pocketmine\item\Item;
use pocketmine\block\Block;

use pocketmine\item\enchantment\Enchantment;

use pocketmine\level\sound\ClickSound;

use EpicCase\ACase;

class Normal extends PluginTask {
    
    public $time = 151;
    public $ids = array(/** Armaduras */310,311,312,313,/** Espadas */276,/** Ferramentas */278,279,/** Arco */261,/** Itens */133,57,41,42,466,322);
    
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
    
    /** Itens */
    if($id == 133 or $id == 57 or $id == 41 or $id == 42 or $id == 466 or $id == 322){
        
    $item->setDamage(0);
    $item->setCount(rand(1,10));
        
    }
    
    /** Armaduras */
    if($id == 310 or $id == 311 or $id == 312 or $id == 313){
        
    $item->setDamage(0);
    $item->setCount(1);
        
    $case = mt_rand(1, 5);
        
    switch($case){
            
    case 1:
            
    $protect = Enchantment::getEnchantment(0);
    $protect->setLevel(rand(1, 3));
    $item->addEnchantment($protect);
    
    break;
    case 2:
            
    $protect = Enchantment::getEnchantment(0);
    $protect->setLevel(rand(1, 3));
    $item->addEnchantment($protect);
    
    $waterspeed = Enchantment::getEnchantment(7);
    $waterspeed->setLevel(rand(1, 3));
    $item->addEnchantment($waterspeed);
        
    break;
    case 3:
    
    $protect = Enchantment::getEnchantment(0);
    $protect->setLevel(rand(1, 3));
    $item->addEnchantment($protect);
            
    $thorns = Enchantment::getEnchantment(5);
    $thorns->setLevel(rand(1, 3));
    $item->addEnchantment($thorns);        
    
    break;
    case 4:
            
    $protect = Enchantment::getEnchantment(0);
    $protect->setLevel(rand(1, 3));
    $item->addEnchantment($protect);
            
    $durability = Enchantment::getEnchantment(17);
    $durability->setLevel(rand(1, 3));
    $item->addEnchantment($durability);        
    
    break;
    case 5:
            
    $fireprotect = Enchantment::getEnchantment(1);
    $fireprotect->setLevel(rand(1, 3));
    $item->addEnchantment($fireprotect); 
    
    break;
        
    }
    }
     
    /** Espadas */    
    if($id == 276){
        
    $item->setDamage(0);
    $item->setCount(1);
        
    $case = mt_rand(1, 5);
        
    switch($case){
            
    case 1:
            
    $sharpness = Enchantment::getEnchantment(9);
    $sharpness->setLevel(rand(1, 3));
    $item->addEnchantment($sharpness);
    
    break;
    case 2:
            
    $sharpness = Enchantment::getEnchantment(9);
    $sharpness->setLevel(rand(1, 3));
    $item->addEnchantment($sharpness);
    
    $looting = Enchantment::getEnchantment(14);
    $looting->setLevel(rand(1, 3));
    $item->addEnchantment($looting);
        
    break;
    case 3:
    
    $looting = Enchantment::getEnchantment(14);
    $looting->setLevel(rand(1, 3));
    $item->addEnchantment($looting);
            
    $fire = Enchantment::getEnchantment(13);
    $fire->setLevel(rand(1, 3));
    $item->addEnchantment($fire);        
    
    break;
    case 4:
            
    $sharpness = Enchantment::getEnchantment(9);
    $sharpness->setLevel(rand(1, 3));
    $item->addEnchantment($sharpness);
            
    $durability = Enchantment::getEnchantment(17);
    $durability->setLevel(rand(1, 3));
    $item->addEnchantment($durability);        
    
    break;
    case 5:
            
    $knock = Enchantment::getEnchantment(12);
    $knock->setLevel(rand(1, 3));
    $item->addEnchantment($knock); 
    
    break;
        
    }      
    }
        
    /** Arco */    
    if($id == 261){
        
    $item->setDamage(0);
    $item->setCount(1);
        
    $case = mt_rand(1, 5);
        
    switch($case){
            
    case 1:
            
    $power = Enchantment::getEnchantment(19);
    $power->setLevel(rand(1, 3));
    $item->addEnchantment($power);
    
    break;
    case 2:
            
    $power = Enchantment::getEnchantment(19);
    $power->setLevel(rand(1, 3));
    $item->addEnchantment($power);
    
    $looting = Enchantment::getEnchantment(14);
    $looting->setLevel(rand(1, 3));
    $item->addEnchantment($looting);
        
    break;
    case 3:
    
    $infinity = Enchantment::getEnchantment(22);
    $infinity->setLevel(rand(1, 3));
    $item->addEnchantment($infinity);
            
    $fire = Enchantment::getEnchantment(21);
    $fire->setLevel(rand(1, 3));
    $item->addEnchantment($fire);        
    
    break;
    case 4:
            
    $power = Enchantment::getEnchantment(19);
    $power->setLevel(rand(1, 3));
    $item->addEnchantment($power);
            
    $durability = Enchantment::getEnchantment(17);
    $durability->setLevel(rand(1, 3));
    $item->addEnchantment($durability);        
    
    break;
    case 5:
            
    $knock = Enchantment::getEnchantment(20);
    $knock->setLevel(rand(1, 3));
    $item->addEnchantment($knock); 
    
    break;
        
    }      
    }    
      
    /** Ferramentas */  
    if($id == 278 or $id == 279){
        
    $item->setDamage(0);
    $item->setCount(1);
        
    $case = mt_rand(1, 5);
        
    switch($case){
            
    case 1:
            
    $efficiency = Enchantment::getEnchantment(15);
    $efficiency->setLevel(rand(1, 3));
    $item->addEnchantment($efficiency);
    
    break;
    case 2:
            
    $efficiency = Enchantment::getEnchantment(15);
    $efficiency->setLevel(rand(1, 3));
    $item->addEnchantment($efficiency);
    
    $fortune = Enchantment::getEnchantment(18);
    $fortune->setLevel(rand(1, 3));
    $item->addEnchantment($fortune);
        
    break;
    case 3:
    
    $fortune = Enchantment::getEnchantment(18);
    $fortune->setLevel(rand(1, 3));
    $item->addEnchantment($fortune);        
    
    break;
    case 4:
            
    $efficiency = Enchantment::getEnchantment(15);
    $efficiency->setLevel(rand(1, 3));
    $item->addEnchantment($efficiency);
            
    $durability = Enchantment::getEnchantment(17);
    $durability->setLevel(rand(1, 3));
    $item->addEnchantment($durability);        
    
    break;
    case 5:
            
    $silk = Enchantment::getEnchantment(16);
    $silk->setLevel(rand(1, 3));
    $item->addEnchantment($silk); 
    
    break;
        
    }      
    }
        
    $chest->setItem($index, $item);
    }
  
	public function onRun($timer){ 
     
    $chest = $this->chest; 
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
        
    if($this->time == 150){
        
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    $this->setItem(10,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);    
    $this->setItem(11,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);    
    $this->setItem(12,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);    
    $this->setItem(13,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);    
    $this->setItem(14,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);    
    $this->setItem(15,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);    
    $this->setItem(16,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);    
    $this->setItem(17,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);    
            
    }
    if($this->time == 149){
    $chest->setItem(17, $chest->getItem(16));
    }                               
    if($this->time == 148){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 147){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 146){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 145){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 144){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 143){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 142){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 141){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }    
    if($this->time == 140){
    $chest->setItem(17, $chest->getItem(16));
    }                             
    if($this->time == 139){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 138){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 137){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 136){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 135){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 134){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 133){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 132){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }
    if($this->time == 131){
    $chest->setItem(17, $chest->getItem(16));
    }                               
    if($this->time == 130){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 129){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 128){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 127){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 126){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 125){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 124){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 123){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }    
    if($this->time == 122){
    $chest->setItem(17, $chest->getItem(16));
    }                              
    if($this->time == 121){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 120){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 119){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 118){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 117){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 116){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 115){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 114){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }
    if($this->time == 113){
    $chest->setItem(17, $chest->getItem(16));
    }                               
    if($this->time == 112){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 111){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 110){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 109){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 108){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 107){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 106){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 105){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }    
    if($this->time == 104){
    $chest->setItem(17, $chest->getItem(16));
    }                             
    if($this->time == 103){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 102){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 101){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 100){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 99){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 98){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 97){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 96){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }
    if($this->time == 95){
    $chest->setItem(17, $chest->getItem(16));
    }                               
    if($this->time == 94){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 93){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 92){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 91){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 90){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 89){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 88){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 87){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }    
    if($this->time == 86){
    $chest->setItem(17, $chest->getItem(16));
    }                              
    if($this->time == 85){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 84){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 83){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 82){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 81){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 80){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 79){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 78){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }
    if($this->time == 77){
    $chest->setItem(17, $chest->getItem(16));
    }                               
    if($this->time == 76){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 75){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 74){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 73){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 72){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 71){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 70){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 69){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }    
    if($this->time == 68){
    $chest->setItem(17, $chest->getItem(16));
    }                             
    if($this->time == 67){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 66){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 65){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 64){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 63){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 62){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 61){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 60){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }
    if($this->time == 59){
    $chest->setItem(17, $chest->getItem(16));
    }                               
    if($this->time == 58){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 57){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 56){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 55){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 54){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 53){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 52){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 51){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }    
    if($this->time == 50){
    $chest->setItem(17, $chest->getItem(16));
    }                              
    if($this->time == 49){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 48){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 47){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 46){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 45){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 44){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 43){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 42){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }
    if($this->time == 41){
    $chest->setItem(17, $chest->getItem(16));
    }                               
    if($this->time == 40){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 39){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 38){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 37){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 36){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 35){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 34){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 33){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }    
    if($this->time == 32){
    $chest->setItem(17, $chest->getItem(16));
    }                             
    if($this->time == 31){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 30){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 29){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 28){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 27){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 26){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 25){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 24){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
    }
    if($this->time == 23){
    $chest->setItem(17, $chest->getItem(16));
    }                               
    if($this->time == 22){
    $chest->setItem(16, $chest->getItem(15));
    }
    if($this->time == 21){
    $chest->setItem(15, $chest->getItem(14));
    }
    if($this->time == 20){
    $chest->setItem(14, $chest->getItem(13));
    }
    if($this->time == 19){
    $chest->setItem(13, $chest->getItem(12));
    }
    if($this->time == 18){
    $chest->setItem(12, $chest->getItem(11));
    }
    if($this->time == 17){
    $chest->setItem(11, $chest->getItem(10));  
    }
    if($this->time == 16){
    $chest->setItem(10, $chest->getItem(9));
    }
    if($this->time == 15){  
    $this->setItem(9,$this->ids[mt_rand(0, count($this->ids)-1)],1,0);
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
    $this->setItem(12,0,1,0);
    $this->setItem(14,0,1,0);
 
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
    if($chest->getItem(13)->isTool() or $chest->getItem(13)->isArmor()){
    $this->getOwner()->getServer()->broadcastMessage("§aO(A) jogador(a)§f ". $this->player->getName()." §aganhou um item §6SUPER RARO");
      }
 
    if($chest->getItem(13)->getId() == 383 or $chest->getItem(13)->getId() == 466 or $chest->getItem(13)->getId() == 322){
    $this->getOwner()->getServer()->broadcastMessage("§aO(A) jogador(a)§f ". $this->player->getName()." §aganhou um item §9RARO");
       }
    }
  }
}  