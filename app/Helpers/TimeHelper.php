<?php

namespace App\Helpers;

use Carbon\Carbon;

class TimeHelper
{
    public static function formatReplyTime($time)
    {
        $currentTime = Carbon::now();
        $diff = $currentTime->diff($time);
        $unit = '';

        if ($diff->y > 0) {
            $unit = $diff->y == 1 ? 'year' : 'years';
            return $diff->y . ' ' . $unit . ' ago';
        } elseif ($diff->m > 0) {
            $unit = $diff->m == 1 ? 'month' : 'months';
            return $diff->m . ' ' . $unit . ' ago';
        } elseif ($diff->d > 0) {
            $unit = $diff->d == 1 ? 'day' : 'days';
            return $diff->d . ' ' . $unit . ' ago';
        } elseif ($diff->h > 0) {
            $unit = $diff->h == 1 ? 'hour' : 'hours';
            return $diff->h . ' ' . $unit . ' ago';
        } elseif ($diff->i > 0) {
            $unit = $diff->i == 1 ? 'minute' : 'minutes';
            return $diff->i . ' ' . $unit . ' ago';
        } elseif ($diff->s > 0) {
            $unit = $diff->s == 1 ? 'second' : 'seconds';
            return $diff->s . ' ' . $unit . ' ago';
        }

        return null;
    }
}

?>