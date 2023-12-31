<?php

declare(strict_types=1);

namespace App\Observer;

use App\Character\Character;
use App\Service\XpCalculatorInterface;
use Symfony\Component\Console\Output\ConsoleOutput;

class OutputtingXpCalculator implements XpCalculatorInterface
{
    public function __construct(private readonly XpCalculatorInterface $innerCalculator)
    {
    }

    public function addXp(Character $winner, int $enemyLevel): void
    {
        $beforeLevel = $winner->getLevel();

        $this->innerCalculator->addXp($winner, $enemyLevel);

        $afterLevel = $winner->getLevel();
        if ($afterLevel > $beforeLevel) {
            $output = new ConsoleOutput();

            $output->writeln('-------------------------------------');
            $output->writeln('<bg=green;fg=white>Congratulations! You\'ve leveled up!</>');
            $output->writeln(sprintf('You are now level "%d"', $winner->getLevel()));
            $output->writeln('-------------------------------------');
        }
    }
}