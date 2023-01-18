<?php

namespace App\Traits;

trait WithTotalDays
{
    public function getTotalDays() {
        $total_days = 0;

        foreach ($this->goals as $goal) {
            $total_days += 1;
        }

        return $total_days;
    }
}