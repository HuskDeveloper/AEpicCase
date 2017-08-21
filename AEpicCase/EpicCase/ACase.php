<?php

namespace EpicCase;

use pocketmine\event\Listener;

use pocketmine\scheduler\PluginTask;

use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;

use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerInteractEvent;

use pocketmine\event\inventory\InventoryPickupItemEvent;
use pocketmine\event\inventory\InventoryTransactionEvent;
use pocketmine\event\inventory\InventoryCloseEvent;

use pocketmine\inventory\ChestInventory;
use pocketmine\inventory\PlayerInventory;

use pocketmine\Player;

use pocketmine\plugin\PluginBase;

use pocketmine\item\Item;
use pocketmine\block\Block;

use pocketmine\math\Vector3;

use pocketmine\command\CommandSender;
use pocketmine\command\Command;

use EpicCase\Inventory\WindowInventory;
use EpicCase\Inventory\WindowHolder;

use EpicCase\Canceled\Cancel;
use EpicCase\Canceled\Closed;

use EpicCase\Menu\Menu;

use EpicCase\Caixa\Basica;
use EpicCase\Caixa\Normal;
use EpicCase\Caixa\Epica;

class ACase extends PluginBase implements Listener{
    
	public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

	public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
         switch(strtolower($command->getName())){              
                case "caixa":
                if(!isset($args[0])){
                   $sender->sendMessage("§l§a(!)§r §aUse: /caixa <comprar (tipo) (quantia) , lista ou ajuda> ");
                   return true;
                }
                if(strtolower($args[0]) == "comprar"){
                   $eco = $this->getServer()->getPluginManager()->getPlugin("Cash");
				   if(!isset($args[1])){
                      $sender->sendMessage("§l§c(!)§r §cA caixa não foi especificada. Para ver as caixas disponiveis use /caixa list");
				   }
                if(!isset($args[2]) or $args[2] == 0 or !is_numeric($args[2])){
                    $sender->sendMessage("§l§c(!)§r §cQuantia inapropriada");
                    return true;
                }                 
                   $quantia = $args[2];                    
                if(strtolower($args[1]) == "basica"){
                   if($eco->myCash($sender->getPlayer()) < (10 * $quantia)){
                      $sender->sendMessage("§l§c(!)§r §cVocê não tem ".(10 * $quantia)." cash para comprar a caixa basica");
                      return true;
                   }
                      $eco->removeCash($sender->getPlayer(), (10 * $quantia));
                      $inv = $sender->getInventory();
                      $basica = Item::get(146, 0, $quantia);
                      $basica->setCustomName("§l§cCaixa §r§7Basica");
                      $inv->addItem($basica);
                      $sender->sendMessage("§l§a(!)§r §aCaixa Basica Comprada!");
                }
                if(strtolower($args[1]) == "normal"){
                   if($eco->myCash($sender->getPlayer()) < (20 * $quantia)){
                      $sender->sendMessage("§l§c(!)§r §cVocê não tem ".(20 * $quantia)." cash para comprar a caixa normal");
                      return true;
                   }
                      $eco->removeCash($sender->getPlayer(), (20 * $quantia));
                      $inv = $sender->getInventory();
                      $normal = Item::get(146, 0, $quantia);
                      $normal->setCustomName("§l§cCaixa §r§7Normal");
                      $inv->addItem($normal);
                      $sender->sendMessage("§l§a(!)§r §aCaixa Normal Comprada!");
                }
                if(strtolower($args[1]) == "epica"){
                   if($eco->myCash($sender->getPlayer()) < (30 * $quantia)){
                      $sender->sendMessage("§l§c(!)§r §cVocê não tem ".(30 * $quantia)." cash para comprar a caixa de elite");
                      return true;
                   }
                      $eco->removeCash($sender->getPlayer(), (30 * $quantia));
                      $inv = $sender->getInventory();
                      $epica = Item::get(146, 0, $quantia);                        
                      $epica->setCustomName("§l§cCaixa §r§7Epica");                        
                      $inv->addItem($epica);
                      $sender->sendMessage("§l§a(!)§r §aCaixa Epica Comprada!");
                }
                if(strtolower($args[0]) == "lista"){
				   $sender->sendMessage("§l§a(!)§r §aListas de caixas:");
				   $sender->sendMessage("- §l§a(!)§r §aBasica: §a$10\n-- §l§a(!)§r §aNormal: §a$20\n--- §l§a(!)§r §aEpica: §a$30");
				}
                if(strtolower($args[0]) == "ajuda"){
				   $sender->sendMessage("§l§a(!)§r §aComandos Disponiveis");
				   $sender->sendMessage("§a/caixa comprar <caixa> <quantidade> §7Para comprar uma caixa");
				   $sender->sendMessage("§a/caixa lista §7Para ver a lista de caixas");
				}
				break;
		   }
		 }
	}
    
	public function onBlockPlaceEvent(BlockPlaceEvent $event){
        $player = $event->getPlayer();
        $hand = $player->getInventory()->getItemInHand();
        
        $block = $event->getBlock();
        $id = $block->getId();
        $name = $event->getItem()->getCustomName();
        
        if($id == 146){
           if(isset($this->tasks[$player->getName()])){
              $player->sendTip("§l§c(!) §r§cA caixa ainda esta ativa");
              $event->setCancelled(true);
           }
           if(!$event->isCancelled()){
			  if($name == "§l§cCaixa §r§7Basica"){     
                 $chest = new WindowInventory($player, 27, "§l§cCaixa §r§7Basica");                       
                 $player->addWindow($chest);
                 $event->setCancelled(true);
		         $hand->setCount($hand->getCount() - 1);
		         $hand->setDamage($hand->getDamage());
		         $player->getInventory()->setItemInHand($hand);
                 $this->tasks[$player->getName()] = $player->getServer()->getScheduler()->scheduleRepeatingTask(new Menu($this, $player, $chest), 1);        
                 $this->type[$player->getName()] = ["Basica", $chest];
              }
              if($name == "§l§cCaixa §r§7Normal"){
                 $chest = new WindowInventory($player, 27, "§l§cCaixa §r§7Normal");                       
                 $player->addWindow($chest);
			     $event->setCancelled(true);
		         $hand->setCount($hand->getCount() - 1);
		         $hand->setDamage($hand->getDamage());
		         $player->getInventory()->setItemInHand($hand);
                 $this->tasks[$player->getName()] = $player->getServer()->getScheduler()->scheduleRepeatingTask(new Menu($this, $player, $chest), 1);       
                 $this->type[$player->getName()] = ["Normal", $chest];
              }
              if($name == "§l§cCaixa §r§7Epica"){
                 $chest = new WindowInventory($player, 27, "§l§cCaixa §r§7Epica");                       
                 $player->addWindow($chest);
                 $event->setCancelled(true);
		         $hand->setCount($hand->getCount() - 1);
		         $hand->setDamage($hand->getDamage());
		         $player->getInventory()->setItemInHand($hand);
                 $this->tasks[$player->getName()] = $player->getServer()->getScheduler()->scheduleRepeatingTask(new Menu($this, $player, $chest), 1);
                 $this->type[$player->getName()] = ["Epica", $chest];
              }
           }
        }
    }
    
    public function Transaction(InventoryTransactionEvent $event){     
         $transactions = $event->getTransaction()->getTransactions();
         foreach($transactions as $tr){
                 if($tr->getInventory() instanceof WindowHolder){
                    $c = $tr;
                 }elseif($tr->getInventory() instanceof PlayerInventory){
                         $p = $tr;
                 }
         }
         $player = $this->getServer()->getPlayer($c->getName());
         if($player == null){
            return;
         }
         if(!isset($this->type[$player->getName()])){
            return;
         }
         $type = $this->type[$player->getName()][0];
         $chest = $this->type[$player->getName()][1];
         $item = $tr->getTargetItem();
         $id = $item->getId();
         $damage = $item->getDamage();
         if($Id == 0){
            return;    
         }                       
         if($id == 159 and $damage == 13){
            $event->setCancelled(true);
            if($type == "Basica"){
               $this->tasks[$player->getName()] = $player->getServer()->getScheduler()->scheduleRepeatingTask(new Basica($this, $player, $chest), 1);
            }
            if($type == "Normal"){
               $this->tasks[$player->getName()] = $player->getServer()->getScheduler()->scheduleRepeatingTask(new Normal($this, $player, $chest), 1);
            }
            if($type == "Epica"){
               $this->tasks[$player->getName()] = $player->getServer()->getScheduler()->scheduleRepeatingTask(new Epica($this, $player, $chest), 1);
            }
           $this->type[$player->getName()] = ["true", $chest];
         }
         if($id == 159 and $damage == 14){
            $event->setCancelled(true);
            $player->removeWindow($chest);
            $this->tasks[$player->getName()] = $player->getServer()->getScheduler()->scheduleRepeatingTask(new Cancel($this, $player), 1);
            unset($this->type[$player->getName()]);
         }
    }
    
    public function onClose(InventoryCloseEvent $event){
        $player = $event->getPlayer();
        $inventory = $event->getInventory();
        if(!$inventory instanceof WindowHolder){
           return;
        }
        if(!isset($this->type[$player->getName()])){
           return;
        }
        $true = $this->type[$player->getName()][0];
        $chest = $this->type[$player->getName()][1];
        if($true !== null){
           $this->tasks[$player->getName()] = $player->getServer()->getScheduler()->scheduleRepeatingTask(new Closed($this, $player, $chest), 1);
        }
    }
    
    public function onPickup(InventoryPickupItemEvent $event){
        $player = $event->getInventory()->getHolder();
        if($player instanceof Player){
           if(isset($this->tasks[$player->getName()])){
              $player->sendPopup("§l§c(!)§r §cA caixa ainda esta ativa!");
              $event->setCancelled(true);
           }
        }
    }
}