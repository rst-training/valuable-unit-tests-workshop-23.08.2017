<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

use RstGroup\ConferenceSystem\Domain\Reservation\Seat;
use RstGroup\ConferenceSystem\Domain\Payment\SeatDiscountStrategy;

class DiscountService
{
    public function calculateForSeat(Seat $seat, int $price, SeatDiscountStrategy $strategies): float
    {
        $discountedPrice = null;

        foreach ($strategies as $strategy) {
            $discountedPrice = $strategy->calculate($seat, $price, $discountedPrice);
        }

        return $discountedPrice;
    }
}
