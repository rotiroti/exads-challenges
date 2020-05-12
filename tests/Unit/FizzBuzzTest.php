<?php declare(strict_types=1);


namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Rotiroti\Exads\FizzBuzz\FizzBuzz;

final class FizzBuzzTest extends TestCase
{
    public function fizzBuzzProvider(): array
    {
        return [
            [0, []],
            [1, ['1']],
            [3, ['1', '2', 'Fizz']],
            [5, ['1', '2', 'Fizz', '4', 'Buzz']],
            [15, ['1', '2', 'Fizz', '4', 'Buzz', 'Fizz', '7', '8', 'Fizz',
                'Buzz', '11', 'Fizz', '13', '14', 'FizzBuzz']]
        ];
    }

    /**
     * @covers \Rotiroti\Exads\FizzBuzz\FizzBuzz
     */
    public function testCanBeInstantiated(): void
    {
        $this->assertInstanceOf(
            FizzBuzz::class,
            new FizzBuzz()
        );
    }

    /**
     * @param int $sequence
     * @param array $expected
     * @dataProvider fizzBuzzProvider
     * @covers       \Rotiroti\Exads\FizzBuzz\FizzBuzz
     */
    public function testFizzBuzz(int $sequence, array $expected): void
    {
        $obj = new FizzBuzz();

        $this->assertSame($expected, $obj->run($sequence));
    }

    /**
     * @covers \Rotiroti\Exads\FizzBuzz\FizzBuzz
     */
    public function testFizzBuzz100(): void
    {
        $obj = new FizzBuzz();
        $sequence = $obj->run();

        $this->assertCount(100, $sequence);
        $this->assertContainsOnly('string', $sequence);
    }
}
