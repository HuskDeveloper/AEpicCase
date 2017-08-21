<?php

namespace EpicCase\Inventory;

use pocketmine\math\Vector3;
use pocketmine\inventory\Inventory;
use pocketmine\inventory\InventoryHolder;

class WindowHolder extends Vector3 implements InventoryHolder{
    protected $inventory;

    public function __construct($x, $y, $z, String $name, Inventory $inventory){
        parent::__construct($x, $y, $z);
        $this->inventory = $inventory;
        $this->name = $name;
    }

    public function getInventory(){
        return $this->inventory;
    }
    
    public function getName(){
        return $this->name;
    }
}