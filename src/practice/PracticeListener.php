<?php

namespace practice;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\Player;

class PracticeListener implements Listener
{

    private $plugin;

    public function __construct(PracticeLoader $plugin)
    {
        $this->plugin = $plugin;
    }

    private function getPlugin()
    {
        return $this->plugin;
    }

    public function modificKnockBack(EntityDamageEvent $event)
    {
        $entity = $event->getEntity();

        if (!($entity instanceof Player)) {
            return;
        }

        if (!($entity->getLevel()->getName() !== PracticeLoader::getInstance()->config->get('world'))) {
            return;
        }

        $x = $entity->getX();
        $y = $entity->getY();
        $z = $entity->getZ();

        $base = 0.4;

        $f = sqrt($x * $x + $z * $z);
        $entity->setMotion();
    }
}