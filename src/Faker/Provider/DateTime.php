<?php declare(strict_types = 1);

namespace Faker\Provider;

class DateTime extends Base
{
    protected static $century = [
        'I',
        'II',
        'III',
        'IV',
        'V',
        'VI',
        'VII',
        'VIII',
        'IX',
        'X',
        'XI',
        'XII',
        'XIII',
        'XIV',
        'XV',
        'XVI',
        'XVII',
        'XVIII',
        'XIX',
        'XX',
        'XXI',
    ];

    protected static $defaultTimezone = null;

    /**
     * @param \DateTime|string|float|int $max
     * @return int|false
     */
    protected static function getMaxTimestamp($max = 'now')
    {
        if (is_numeric($max)) {
            return (int) $max;
        }

        if ($max instanceof \DateTime) {
            return $max->getTimestamp();
        }

        return strtotime(empty($max) ? 'now' : $max);
    }

    /**
     * Get a timestamp between January 1, 1970 and now
     *
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     *
     * @example 1061306726
     */
    public static function unixTime($max = 'now'): int
    {
        return mt_rand(0, static::getMaxTimestamp($max));
    }

    /**
     * Get a datetime object for a date between January 1, 1970 and now
     *
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @param string $timezone time zone in which the date time should be set, default to DateTime::$defaultTimezone, if set, otherwise the result of `date_default_timezone_get`
     * @example DateTime('2005-08-16 20:39:21')
     * @see http://php.net/manual/en/timezones.php
     * @see http://php.net/manual/en/function.date-default-timezone-get.php
     */
    public static function dateTime($max = 'now', ?string $timezone = null): \DateTime
    {
        return static::setTimezone(
            new \DateTime('@' . static::unixTime($max)),
            $timezone
        );
    }

    /**
     * Get a datetime object for a date between January 1, 001 and now
     *
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @param string|null $timezone time zone in which the date time should be set, default to DateTime::$defaultTimezone, if set, otherwise the result of `date_default_timezone_get`
     * @example DateTime('1265-03-22 21:15:52')
     * @see http://php.net/manual/en/timezones.php
     * @see http://php.net/manual/en/function.date-default-timezone-get.php
     */
    public static function dateTimeAD($max = 'now', ?string $timezone = null): \DateTime
    {
        $min = (PHP_INT_SIZE > 4 ? -62135597361 : -PHP_INT_MAX);
        return static::setTimezone(
            new \DateTime('@' . mt_rand($min, static::getMaxTimestamp($max))),
            $timezone
        );
    }

    /**
     * get a date string formatted with ISO8601
     *
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @example '2003-10-21T16:05:52+0000'
     */
    public static function iso8601($max = 'now'): string
    {
        return static::date(\DateTime::ISO8601, $max);
    }

    /**
     * Get a date string between January 1, 1970 and now
     *
     * @param \DateTime|int|string $max    maximum timestamp used as random end limit, default to "now"
     * @example '2008-11-27'
     */
    public static function date(string $format = 'Y-m-d', $max = 'now'): string
    {
        return static::dateTime($max)->format($format);
    }

    /**
     * Get a time string (24h format by default)
     *
     * @param \DateTime|int|string $max    maximum timestamp used as random end limit, default to "now"
     * @example '15:02:34'
     */
    public static function time(string $format = 'H:i:s', $max = 'now'): string
    {
        return static::dateTime($max)->format($format);
    }

    /**
     * Get a DateTime object based on a random date between two given dates.
     * Accepts date strings that can be recognized by strtotime().
     *
     * @param \DateTime|string $startDate Defaults to 30 years ago
     * @param \DateTime|string $endDate   Defaults to "now"
     * @param string|null $timezone time zone in which the date time should be set, default to DateTime::$defaultTimezone, if set, otherwise the result of `date_default_timezone_get`
     * @example DateTime('1999-02-02 11:42:52')
     * @see http://php.net/manual/en/timezones.php
     * @see http://php.net/manual/en/function.date-default-timezone-get.php
     */
    public static function dateTimeBetween($startDate = '-30 years', $endDate = 'now', ?string $timezone = null): \DateTime
    {
        $startTimestamp = $startDate instanceof \DateTime ? $startDate->getTimestamp() : strtotime($startDate);
        $endTimestamp = static::getMaxTimestamp($endDate);

        if ($startTimestamp > $endTimestamp) {
            throw new \InvalidArgumentException('Start date must be anterior to end date.');
        }

        $timestamp = mt_rand($startTimestamp, $endTimestamp);

        return static::setTimezone(
            new \DateTime('@' . $timestamp),
            $timezone
        );
    }

    /**
     * Get a DateTime object based on a random date between one given date and
     * an interval
     * Accepts date string that can be recognized by strtotime().
     *
     * @param \DateTime|string $date      Defaults to 30 years ago
     * @param string $interval  Defaults to 5 days after
     * @param string|null $timezone time zone in which the date time should be set, default to DateTime::$defaultTimezone, if set, otherwise the result of `date_default_timezone_get`
     * @example dateTimeInInterval('1999-02-02 11:42:52', '+ 5 days')
     * @see http://php.net/manual/en/timezones.php
     * @see http://php.net/manual/en/function.date-default-timezone-get.php
     */
    public static function dateTimeInInterval($date = '-30 years', string $interval = '+5 days', ?string $timezone = null): \DateTime
    {
        $intervalObject = \DateInterval::createFromDateString($interval);
        $datetime       = $date instanceof \DateTime ? $date : new \DateTime($date);
        $otherDatetime  = clone $datetime;
        $otherDatetime->add($intervalObject);

        $begin = $datetime > $otherDatetime ? $otherDatetime : $datetime;
        $end = $datetime === $begin ? $otherDatetime : $datetime;

        return static::dateTimeBetween(
            $begin,
            $end,
            $timezone
        );
    }

    /**
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @param string|null $timezone time zone in which the date time should be set, default to DateTime::$defaultTimezone, if set, otherwise the result of `date_default_timezone_get`
     * @example DateTime('1964-04-04 11:02:02')
     */
    public static function dateTimeThisCentury($max = 'now', ?string $timezone = null): \DateTime
    {
        return static::dateTimeBetween('-100 year', $max, $timezone);
    }

    /**
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @param string|null $timezone time zone in which the date time should be set, default to DateTime::$defaultTimezone, if set, otherwise the result of `date_default_timezone_get`
     * @example DateTime('2010-03-10 05:18:58')
     */
    public static function dateTimeThisDecade($max = 'now', ?string $timezone = null): \DateTime
    {
        return static::dateTimeBetween('-10 year', $max, $timezone);
    }

    /**
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @param string|null $timezone time zone in which the date time should be set, default to DateTime::$defaultTimezone, if set, otherwise the result of `date_default_timezone_get`
     * @example DateTime('2011-09-19 09:24:37')
     */
    public static function dateTimeThisYear($max = 'now', ?string $timezone = null): \DateTime
    {
        return static::dateTimeBetween('first day of january this year', $max, $timezone);
    }

    /**
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @param string|null $timezone time zone in which the date time should be set, default to DateTime::$defaultTimezone, if set, otherwise the result of `date_default_timezone_get`
     * @example DateTime('2011-10-05 12:51:46')
     */
    public static function dateTimeThisMonth($max = 'now', ?string $timezone = null): \DateTime
    {
        return static::dateTimeBetween('-1 month', $max, $timezone);
    }

    /**
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @example 'am'
     */
    public static function amPm($max = 'now'): string
    {
        return static::dateTime($max)->format('a');
    }

    /**
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @example '22'
     */
    public static function dayOfMonth($max = 'now'): string
    {
        return static::dateTime($max)->format('d');
    }

    /**
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @example 'Tuesday'
     */
    public static function dayOfWeek($max = 'now'): string
    {
        return static::dateTime($max)->format('l');
    }

    /**
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @example '7'
     */
    public static function month($max = 'now'): string
    {
        return static::dateTime($max)->format('m');
    }

    /**
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @example 'September'
     */
    public static function monthName($max = 'now'): string
    {
        return static::dateTime($max)->format('F');
    }

    /**
     * @param \DateTime|int|string $max maximum timestamp used as random end limit, default to "now"
     * @example '1673'
     */
    public static function year($max = 'now'): string
    {
        return static::dateTime($max)->format('Y');
    }

    /**
     * @example 'XVII'
     */
    public static function century(): string
    {
        return static::randomElement(static::$century);
    }

    /**
     * @example 'Europe/Paris'
     */
    public static function timezone(): string
    {
        return static::randomElement(\DateTimeZone::listIdentifiers());
    }

    /**
     * Internal method to set the time zone on a DateTime.
     */
    private static function setTimezone(\DateTime $dt, ?string $timezone): \DateTime
    {
        return $dt->setTimezone(new \DateTimeZone(static::resolveTimezone($timezone)));
    }

    /**
     * Sets default time zone.
     */
    public static function setDefaultTimezone(?string $timezone = null): void
    {
        static::$defaultTimezone = $timezone;
    }

    /**
     * Gets default time zone.
     */
    public static function getDefaultTimezone(): ?string
    {
        return static::$defaultTimezone;
    }

    /**
     */
    private static function resolveTimezone(?string $timezone): ?string
    {
        return ((null === $timezone) ? ((null === static::$defaultTimezone) ? date_default_timezone_get() : static::$defaultTimezone) : $timezone);
    }
}
