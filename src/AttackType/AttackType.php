<?php

declare(strict_types=1);

namespace App\AttackType;

interface AttackType
{
    public function performAttack(int $baseDamage): int;
}