<?php

declare(strict_types=1);

namespace TestingLegacyCode;

use function file_get_contents;
use function file_put_contents;

class FilesystemInteraction
{
// phpcs:disable
//    Code before refactoring (no DI):
//    public function countHit(): void
//    {
//        $count = file_get_contents(__DIR__ . '/hit_counter.txt');
//        file_put_contents(__DIR__ . '/hit_counter.txt', ++$count);
//    }
// phpcs:enable

    public function countHit(string $file = __DIR__ . '/hit_counter.txt'): void
    {
        $count = file_get_contents($file);
        file_put_contents($file, ++$count);
    }
}
