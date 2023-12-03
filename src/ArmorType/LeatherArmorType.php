<?php

declare(strict_types=1);

namespace App\ArmorType;

class LeatherArmorType implements ArmorType
{
    public function getArmorReduction(int $damage): float
    {
        return floor($damage * 0.25);
    }
}