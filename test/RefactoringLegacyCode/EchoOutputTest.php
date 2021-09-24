<?php

declare(strict_types=1);

namespace RefactoringLegacyCodeTest;

use PHPUnit\Framework\TestCase;
use RefactoringLegacyCode\EchoOutput;

use function ob_get_clean;
use function ob_start;

class EchoOutputTest extends TestCase
{
    /**
     * @covers \RefactoringLegacyCode\EchoOutput::yodel
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
     * @covers \RefactoringLegacyCode\EchoOutput::yodel
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
