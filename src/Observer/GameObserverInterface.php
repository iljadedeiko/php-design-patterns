<?php

declare(strict_types=1);

namespace App\Observer;

use App\FightResult;

interface GameObserverInterface
{
    public function onFightFinished(FightResult $fightResult): void;
}