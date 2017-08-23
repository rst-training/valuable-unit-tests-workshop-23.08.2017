<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class FreeSeatDiscountStrategy implements SeatDiscountStrategy
{

    public function calculate(Seat $seat, int $price, float $discountedPrice): float
    {
        if ($this->configuration->isEnabledForSeat(__CLASS__, $seat) && $discountedPrice === null) {
            return 0;
        }

        return $discountedPrice;
    }
}
