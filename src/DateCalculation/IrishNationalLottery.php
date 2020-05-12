<?php declare(strict_types=1);

namespace Rotiroti\Exads\DateCalculation;

use DateTime;
use Exception;

/**
 * Class IrishNationalLottery
 * @package Rotiroti\Exads\DateCalculation
 */
final class IrishNationalLottery
{
    private const LOTTERY_TIME = '8 PM';

    private const WEEK_DAY = 'Saturday';

    private const MID_WEEK_DAY = 'Wednesday';

    private const NEXT_MID_WEEK_DAY = 'next wednesday ' . self::LOTTERY_TIME;

    private const NEXT_WEEK_DAY = 'next saturday ' . self::LOTTERY_TIME;

    private DateTime $currentDateTime;

    /**
     * IrishNationalLottery constructor.
     */
    public function __construct()
    {
        $this->currentDateTime = new DateTime();
    }

    public function getCurrentDateTime(): DateTime
    {
        return $this->currentDateTime;
    }

    public function setCurrentDateTime(DateTime $currentDateTime): void
    {
        $this->currentDateTime = $currentDateTime;
    }

    public function setCurrentDateTimeFromString(string $format): void
    {
        try {
            $this->currentDateTime = new DateTime($format);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit(1);
        }
    }

    /**
     * Calculate and returns the next valid draw date based on date and time.
     *
     * The invocation of this method on a newly IrishNationalLottery object
     * will return the next valid draw date based on the current date and time.
     *
     * In case we want to retrieve the next valid draw date based on an optionally
     * date and time, use one of the methods setCurrentDateTime() or setCurrentDateTimeFromString()
     * before calling this method.
     *
     * Note the current timezone is set to UTC and not 'Europe/Dublin'.
     * @return DateTime
     */
    public function nextDraw(): DateTime
    {
        $newDate = clone $this->currentDateTime;

        if ($this->isLotteryDay()) {
            return $newDate->modify(self::LOTTERY_TIME);
        }

        $nextWednesday = clone $this->currentDateTime;
        $nextSaturday = clone $this->currentDateTime;

        $nextWednesday->modify(self::NEXT_MID_WEEK_DAY);
        $nextSaturday->modify(self::NEXT_WEEK_DAY);

        $diff = date_diff($nextWednesday, $newDate)->days;
        $diff2 = date_diff($nextSaturday, $newDate)->days;

        return $diff < $diff2 ? $nextWednesday : $nextSaturday;
    }

    /**
     * Check if the currentDateTime is a lottery day (Wed, Sat at 8 pm).
     * @return bool
     */
    private function isLotteryDay(): bool
    {
        $currentDay = $this->currentDateTime->format('l');
        $currentHour = (int)$this->currentDateTime->format('G');

        if ($currentHour < 20) {
            return ($currentDay == self::MID_WEEK_DAY || $currentDay == self::WEEK_DAY);
        }

        return false;
    }
}
