<?php declare(strict_types=1);


namespace Tests\Unit;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Rotiroti\Exads\MissingElement\RandomMissingElement;

final class RandomMissingElementTest extends TestCase
{
    /**
     * @covers \Rotiroti\Exads\MissingElement\RandomMissingElement
     */
    public function testCanBeInstantiated(): void
    {
        $this->assertInstanceOf(
            RandomMissingElement::class,
            new RandomMissingElement()
        );
    }

    /**
     * @covers \Rotiroti\Exads\MissingElement\RandomMissingElement
     */
    public function testFailToGenerateRandomUniqueSequence(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new RandomMissingElement();
        $obj->unique(0);
    }

    /**
     * @covers \Rotiroti\Exads\MissingElement\RandomMissingElement
     */
    public function testFailToGenerateRandomSequenceWithDuplicates(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new RandomMissingElement();
        $obj->duplicates(0);
    }

    /**
     * @covers \Rotiroti\Exads\MissingElement\RandomMissingElement
     */
    public function testGenerateRandomUniqueSequence(): void
    {
        $obj = new RandomMissingElement();
        $sequence = $obj->unique(500);

        $this->assertIsArray($sequence);
        $this->assertCount(500, $sequence);
    }

    /**
     * @covers \Rotiroti\Exads\MissingElement\RandomMissingElement
     */
    public function testGenerateRandomSequenceWithDuplicates(): void
    {
        $obj = new RandomMissingElement();
        $sequence = $obj->duplicates(500);

        $this->assertIsArray($sequence);
        $this->assertCount(500, $sequence);
    }

    /**
     * @covers \Rotiroti\Exads\MissingElement\RandomMissingElement
     */
    public function testFailToFindMissingElementWhenPassingInvalidArgument(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $obj = new RandomMissingElement();
        $obj->find(null);
    }

    /**
     * @covers \Rotiroti\Exads\MissingElement\RandomMissingElement
     */
    public function testFindMissingElement(): void
    {
        $obj = new RandomMissingElement();
        $sequence = $obj->unique(500);
        $result = $obj->find($sequence);

        /**
         * NOTE:
         *
         * This is a simple assertion which verify that a number is returned
         * after removing an element from the original sequence. If we want
         * to verify the correctness of the entire algorithm, we should mock
         * the built-in functions likes mt_rand().
         */
        $this->assertTrue($result > 1);
    }
}
