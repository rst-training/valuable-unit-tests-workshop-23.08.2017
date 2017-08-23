<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class DiscountService
{
    /**
     * @var SeatsStrategyConfiguration
     */
    private $seatDiscountStrategies;

    public function __construct(array $seatDiscountStrategies)
    {
        $this->seatDiscountStrategies = $seatDiscountStrategies;
    }

    public function calculateForSeat(Seat $seat, int $price): float
    {
        $discountedPrice = null;

        foreach ($this->seatDiscountStrategies as $strategy) {
            $discountedPrice = $strategy->calculate($seat, $price, $discountedPrice);
        }

        return $discountedPrice;
    }

}
