<?php
namespace App\Helpers;

use Carbon\Carbon;

class DateHelper {

    public static function DateFormat($created_at) {

        $created_at = Carbon::parse($created_at);
        $now = Carbon::now();

        if($created_at->diffInHours($now) < 1) {
            if($created_at->diffInMinutes($now) < 1) {
                return "방금 전";
            } else {
                return $created_at->diffInMinutes($now)."분 전";
            }
        } else if($created_at->diffInHours($now) < 24) {
            return $created_at->diffForHumans($now);
        } else {
            return $created_at->format('Y.m.d');
        }
    }
}
