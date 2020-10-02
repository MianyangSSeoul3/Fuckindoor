<?php

/*
 * This plugin is made for fun, Users can modify this plugin.
 * 이 플러그인은 재미를 위해 만들어 졌습니다. 사용자는 이 플러그인을 수정할 수 있습니다.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License
 */

/**
 * @name Fuckindoor
 * @api 3.0.0
 * @version 1.0.0
 * @main jjun18\Fuckindoor
 * @author jjun18
 */

namespace jjun18;

use pocketmine\{block\Block,
    event\Listener,
    event\player\PlayerInteractEvent,
    level\sound\DoorBumpSound,
    math\Vector3,
    plugin\PluginBase
};

class Fuckindoor extends PluginBase implements Listener
{

    public function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function Knock(PlayerInteractEvent $event)
    {
        if ($event->getPlayer()->isSneaking()) {
            if ($event->getAction() === PlayerInteractEvent::RIGHT_CLICK_BLOCK) {
                if ($event->getBlock() instanceof Door) {
                    $event->getBlock()->getLevel()->addSound(new DoorBumpSound(
                        new Vector3($event->getBlock()asVector3())));
                }
            }
        }
    }
}
