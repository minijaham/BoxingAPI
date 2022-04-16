<?php

declare(strict_types = 1);

namespace minijaham\Boxing;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\player\Player;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;

class Boxing extends PluginBase implements Listener
{
	public array $hits = [];
	
	public static Boxing $instance;
	
	public static function getInstance() : self
    	{
        	return self::$instance;
    	}
	
	public function onAttack(EntityDamageEvent $event) : void
	{
        	$entity = $event->getEntity();
		if ($event->isCancelled()) {
			return;
		}
        	if (!($event instanceof EntityDamageByEntityEvent)) {
			return;
		}
        	$damager = $event->getDamager();
        	if (!($entity instanceof Player)) {
			return;
		}
        	if (!($damager instanceof Player)) {
			return;
		}
		if (!isset($this->hits[$damager->getName()])) {
			$this->hits[$damager->getName()] = 1;
            		return;
		}
		$this->hits[$damager->getName()] = $this->hits[$damager->getName()]++;
    	}
	
	public function getHits(Player $player) : int
	{
		if (!isset($this->hits[$player->getName()])) {
            		return 0;
		}
		return $this->hits[$player->getName()];
	}
	
	public function removeHits(Player $player) : void
	{
		if (isset($this->hits[$player->getName()])) {
            		unset($this->hits[$player->getName()]);
			return;
		}
	}
	
	public function calculateHits(Player $first, Player $second) : int
	{
		return ($this->getHits($first) - $this->getHits($second));
	}
}
