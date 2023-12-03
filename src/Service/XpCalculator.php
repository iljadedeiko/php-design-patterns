<?php

declare(strict_types=1);

namespace App\Service;

use App\Character\Character;

class XpCalculator implements XpCalculatorInterface
{
    public function addXp(Character $winner, int $enemyLevel): void
    {
        $xpEarned = $this->calculateXpEarned($winner->getLevel(), $enemyLevel);

        $totalXp = $winner->addXp($xpEarned);

        $xpForNextLvl = $this->getXpForNextLvl($winner->getLevel());
        if ($totalXp >= $xpForNextLvl) {
            $winner->levelUp();
        }
    }

    private function calculateXpEarned(int $winnerLevel, $loserLevel): int|float
    {
        $baseXp = 30;
        $rawXp = $baseXp * $loserLevel;

        $levelDiff = $winnerLevel - $loserLevel;
        return match (true) {
            $levelDiff === 0 => $rawXp,

            // you get less XP when opponent is lower level than you
            $levelDiff > 0 => $rawXp - floor($loserLevel * 0.20),

            // you get extra XP when the opponent is higher level than you
            $levelDiff < 0 => $rawXp + floor($loserLevel * 0.20),
        };
    }

    private function getXpForNextLvl(int $currentLevel): int
    {
        $baseXp = 100;
        $xpNeededForCurrentLvl = $this->progressionFormula($baseXp, $currentLevel);
        $xpNeededForNextLvl = $this->progressionFormula($baseXp, $currentLevel + 1);

        // since the character holds the total amount of XP earned we need to include
        // the XP needed for the current level.
        return $xpNeededForNextLvl + $xpNeededForCurrentLvl;
    }

    // fibonacci formula
    private function progressionFormula(int $baseXp, int $currentLvl): int
    {
        $currentLvl--;
        if ($currentLvl === 0) {
            return 0;
        }

        return $baseXp * ($currentLvl - 1) + ($baseXp * ($currentLvl));
    }
}

