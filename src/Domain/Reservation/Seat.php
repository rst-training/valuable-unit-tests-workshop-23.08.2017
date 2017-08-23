<?php

namespace RstGroup\ConferenceSystem\Domain\Reservation;

use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;

class Seat
{
    private $type;
    private $quantity;

    public function __construct(string $type, int $quantity)
    {
        $this->type = $type;

        if (!is_int($quantity) || $quantity < 0) {
            throw new \InvalidArgumentException('Quantity should not be negative');
        }

        $this->quantity = $quantity;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getSeatPrice(array $seatsPrices){
        $priceForSeat = $seatsPrices[$this->getType()][0];
        return $priceForSeat * $this->getQuantity();
    }

    public function getSeatPriceWithDiscount(array $seatsPrices, DiscountService $discountService){
        $priceForSeat = $seatsPrices[$this->getType()][0];
        return $discountService->calculateForSeat($this, $priceForSeat);
    }
}