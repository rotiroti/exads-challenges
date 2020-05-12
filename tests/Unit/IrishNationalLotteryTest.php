<?php


namespace Tests\Unit;

use DateTime;
use Exception;
use PHPUnit\Framework\TestCase;
use Rotiroti\Exads\DateCalculation\IrishNationalLottery;

final class IrishNationalLotteryTest extends TestCase
{
    public function nextDrawProvider(): array
    {
        return [
            ['1990-05-30 8 AM', 'Wednesday 30th of May 1990 08:00:00 PM'],
            ['2020-05-12 5 PM', 'Wednesday 13th of May 2020 08:00:00 PM'],
            ['2020-05-13 7 PM', 'Wednesday 13th of May 2020 08:00:00 PM'],
            ['2020-05-13 8 PM', 'Saturday 16th of May 2020 08:00:00 PM'],
            ['2020-05-16 7:59 PM', 'Saturday 16th of May 2020 08:00:00 PM'],
        ];
    }

    /**
     * @covers \Rotiroti\Exads\DateCalculation\IrishNationalLottery
     */
    public function testCanBeInstantiated(): void
    {
        $this->assertInstanceOf(IrishNationalLottery::class, new IrishNationalLottery());
    }

    /**
     * @covers \Rotiroti\Exads\DateCalculation\IrishNationalLottery
     */
    public function testIsInitializedWithTheCurrentDateTime(): void
    {
        $obj = new IrishNationalLottery();
        $this->assertInstanceOf(DateTime::class, $obj->getCurrentDateTime());
    }

    /**
     * @param string $optional
     * @param string $expected
     * @dataProvider nextDrawProvider
     * @covers       \Rotiroti\Exads\DateCalculation\IrishNationalLottery
     * @throws Exception
     */
    public function testNextDrawWithOptionalDateTimeString(string $optional, string $expected): void
    {
        $obj = new IrishNationalLottery();
        $obj->setCurrentDateTimeFromString($optional);
        $got = $obj->nextDraw()->format('l jS \of F Y h:i:s A');
        $this->assertEquals($expected, $got);
    }

    /**
     * @param string $optional
     * @param string $expected
     * @dataProvider nextDrawProvider
     * @covers       \Rotiroti\Exads\DateCalculation\IrishNationalLottery
     * @throws Exception
     */
    public function testNextDrawWithOptionalDateTimeObject(string $optional, string $expected): void
    {
        $obj = new IrishNationalLottery();
        $obj->setCurrentDateTime(new DateTime($optional));
        $got = $obj->nextDraw()->format('l jS \of F Y h:i:s A');
        $this->assertEquals($expected, $got);
    }
}
