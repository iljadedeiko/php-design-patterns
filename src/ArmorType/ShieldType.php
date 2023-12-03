<?php

declare(strict_types=1);

namespace App\ArmorType;

use App\Dice;

class ShieldType implements ArmorType
{
    public function getArmorReduction(int $damage): int
    {
        $changeToBlack = Dice::roll(100);

        return $changeToBlack > 80 ? $damage : 0;
    }
}