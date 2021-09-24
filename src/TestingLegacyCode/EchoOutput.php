<?php

declare(strict_types=1);

namespace TestingLegacyCode;

class EchoOutput
{
    public function yodel(?string $tune = null): void
    {
        if ($tune) {
            echo $tune;
        } else {
            echo 'Odl lay ee';
        }
    }
}
