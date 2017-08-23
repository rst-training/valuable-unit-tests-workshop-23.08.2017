<?php

namespace RstGroup\ConferenceSystem\Domain\Reservation;

use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;

class SeatsCollection
{
    protected $seats = [];

    public function add(Seat $seat)
    {
        $this->seats[] = $seat;
    }

    /**
     * @return Seat[]
     */
    public function getAll(): array
    {
        return $this->seats;
    }

    public static function fromArray(array $seats): SeatsCollection
    {
        $seatsCollection = new self();
        foreach ($seats as $seat) {
            $seatsCollection->add($seat);
        }

        return $seatsCollection;
    }

    public function getSeatsTotalPrice(array $seatsPrices, DiscountService $discountService){
        $totalCost = 0;

        foreach ($this->getAll() as $seat) {
            $totalCost += min($seat->getSeatPriceWithDiscount($seatsPrices, $discountService), $seat->getSeatPrice($seatsPrices));
        }
    }
}