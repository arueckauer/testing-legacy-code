<?php

declare(strict_types=1);

namespace TestingLegacyCodeTest;

use Mockery;
use PHPUnit\Framework\TestCase;
use TestingLegacyCode\StaticMethodInvocation;

class StaticMethodInvocationTest extends TestCase
{
    /**
     * @covers \TestingLegacyCode\StaticMethodInvocation::getPowerLevel
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_getPowerLevel_under_9000(): void
    {
        Mockery::mock('alias:TestingLegacyCode\Goku')
            ->shouldReceive('powerLevel')
            ->andReturn(37);

        self::assertSame(
            'Suppressed.',
            (new StaticMethodInvocation())->getPowerLevel()
        );
    }

    /**
     * @covers \TestingLegacyCode\StaticMethodInvocation::getPowerLevel
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_getPowerLevel_over_9000(): void
    {
        Mockery::mock('alias:TestingLegacyCode\Goku')
            ->shouldReceive('powerLevel')
            ->andReturn(15000);

        self::assertSame(
            'It is over 9000!',
            (new StaticMethodInvocation())->getPowerLevel()
        );
    }
}
