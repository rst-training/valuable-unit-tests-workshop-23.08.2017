<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

use PHPUnit\Runner\Exception;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class DiscountService
{
    /**
     * @var SeatsStrategyConfiguration
     */
    private $discountStrategies;

    public function __construct($discountStrategies)
    {
        $this->discountStrategies = $discountStrategies;
    }

    public function calculateForSeat(Seat $seat, int $price): float
    {
        $discountedPrice = null;

        foreach ($this->discountStrategies as $strategy) {$discountedPrice = $strategy->calculate($seat, $price, $discountedPrice);
        }

        return $discountedPrice;
    }

}
