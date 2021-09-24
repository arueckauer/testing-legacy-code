<?php

declare(strict_types=1);

namespace RefactoringLegacyCodeTest;

use Mockery;
use PHPUnit\Framework\TestCase;
use RefactoringLegacyCode\StaticMethodInvocation;

class StaticMethodInvocationTest extends TestCase
{
    /**
     * @covers \RefactoringLegacyCode\StaticMethodInvocation::getPowerLevel
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_getPowerLevel_under_9000(): void
    {
        Mockery::mock('alias:RefactoringLegacyCode\Goku')
            ->shouldReceive('powerLevel')
            ->andReturn(37);

        self::assertSame(
            'Suppressed.',
            (new StaticMethodInvocation())->getPowerLevel()
        );
    }

    /**
     * @covers \RefactoringLegacyCode\StaticMethodInvocation::getPowerLevel
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_getPowerLevel_over_9000(): void
    {
        Mockery::mock('alias:RefactoringLegacyCode\Goku')
            ->shouldReceive('powerLevel')
            ->andReturn(15000);

        $legacyCode = new StaticMethodInvocation();

        self::assertSame(
            'It is over 9000!',
            (new StaticMethodInvocation())->getPowerLevel()
        );
    }
}
