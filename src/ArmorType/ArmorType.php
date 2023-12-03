<?php

declare(strict_types=1);

namespace App\ArmorType;

interface ArmorType
{
    public function getArmorReduction(int $damage): float|int;
}