<?php

namespace refaltor\FoodEffect\event;

use refaltor\FoodEffect\Main;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerItemConsumeEvent;
use pocketmine\Player;
use pocketmine\utils\Config;

class FoodEffect implements Listener
{
    public function onItemConsumed(PlayerItemConsumeEvent $event){
        $player = $event->getPlayer();
        $getAll = Main::getMain()->getConfig()->getAll();
        $item = $event->getItem();
        if ($player instanceof Player){
            $inConfigIds = array_keys($getAll);
            if (in_array($item->getId(), $inConfigIds)){
                $food = Main::getMain()->getConfig()->getAll()[$item->getId()];
                $effect = $food["effect"];
                foreach($effect as $id => $values){
                    $player->addEffect(new EffectInstance(Effect::getEffect($id), $values["duration"], $values["niveau"], $values["visible"]));
                }
            }
        }
    }
}
