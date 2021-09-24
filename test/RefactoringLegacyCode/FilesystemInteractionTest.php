<?php

declare(strict_types=1);

namespace RefactoringLegacyCodeTest;

use org\bovigo\vfs\vfsStream;
use PHPUnit\Framework\TestCase;
use RefactoringLegacyCode\FilesystemInteraction;

class FilesystemInteractionTest extends TestCase
{
    /**
     * @covers \RefactoringLegacyCode\FilesystemInteraction::countHit
     */
    public function test_countHit(): void
    {
        $vfs = vfsStream::setup();

        $hitCounterFile = vfsStream::newFile('test_hit_counter.txt')
            ->at($vfs)
            ->setContent('1337');

        $filesystemInteraction = new FilesystemInteraction();
        $filesystemInteraction->countHit($hitCounterFile->url());

        self::assertSame(
            '1338',
            $hitCounterFile->getContent()
        );
    }
}
