<?php

namespace RstGroup\ConferenceSystem\Domain\Payment;


use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class SeatsStrategyConfiguration
{
    public function discountStrategiesFor(Seat $seat): array
    {
        return [
            new AtLeastTenEarlyBirdSeatsDiscountStrategy($this),
            new FreeSeatDiscountStrategy($this),
        ];
    }
}