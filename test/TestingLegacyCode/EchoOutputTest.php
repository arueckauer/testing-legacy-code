<?php

declare(strict_types=1);

namespace TestingLegacyCodeTest;

use PHPUnit\Framework\TestCase;
use TestingLegacyCode\EchoOutput;

use function ob_get_clean;
use function ob_start;

class EchoOutputTest extends TestCase
{
    /**
     * @covers \TestingLegacyCode\EchoOutput::yodel
     */
    public function test_yodel_with_null_argument(): void
    {
        ob_start();

        (new EchoOutput())->yodel();

        $output = ob_get_clean();

        self::assertSame(
            'Odl lay ee',
            $output
        );
    }

    /**
     * @covers \TestingLegacyCode\EchoOutput::yodel
     */
    public function test_yodel_with_string_argument(): void
    {
        ob_start();

        (new EchoOutput())->yodel('Oh, lorolo lolalalalalalalalolalalolalalola lo la lo');

        $output = ob_get_clean();

        self::assertSame(
            'Oh, lorolo lolalalalalalalalolalalolalalola lo la lo',
            $output
        );
    }
}
