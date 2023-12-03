<?php

declare(strict_types=1);

namespace App\Observer;

use App\FightResult;
use App\Service\XpCalculatorInterface;

class XpEarnedObserver implements GameObserverInterface
{
    // this class must implement an interface to support decoration
    public function __construct(private readonly XpCalculatorInterface $xpCalculator)
    {
    }

    public function onFightFinished(FightResult $fightResult): void
    {
        $winner = $fightResult->getWinner();
        $loser = $fightResult->getLoser();

        $this->xpCalculator->addXp($winner, $loser->getLevel());
    }
}