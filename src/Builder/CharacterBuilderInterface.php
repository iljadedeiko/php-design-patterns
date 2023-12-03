<?php

declare(strict_types=1);

namespace App\Builder;

interface CharacterBuilderInterface
{
    public function setMaxHealth(int $maxHealth): self;

    public function setBaseDamage(int $baseDamage): self;

    public function setAttackType(string ...$attackTypes): self;

    public function setArmorType(string $armorType): self;
}