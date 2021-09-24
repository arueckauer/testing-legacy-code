<?php

declare(strict_types=1);

namespace RefactoringLegacyCode;

class StaticMethodInvocation
{
    public function getPowerLevel(): string
    {
        $result = Goku::powerLevel();

        return $result > 9000 ? 'It is over 9000!' : 'Suppressed.';
    }
}
