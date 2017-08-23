<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;

use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class SeatDiscountPoolStrategy
{

    private $discountNumber;
    private $discountAmount;

    public function __construct($discountNumber, $discountAmount)
    {
        $this->discountNumber = $discountNumber;
        $this->discountAmount = $discountAmount;
    }

    public function calculate(Seat $seat, int $price): float
    {
        $priceAfterDiscount = $seat->getQuantity() * $price;
        if ($this->discountNumber - $seat->getQuantity() > 0) {
            $priceAfterDiscount -= $this->discountAmount * $seat->getQuantity();
            $this->discountNumber -= $seat->getQuantity();
        } else {
            $priceAfterDiscount -= $this->discountAmount * $this->discountNumber;
            $this->discountNumber = 0;

        }
        return $priceAfterDiscount;
    }
}
