<?php

namespace RstGroup\ConferenceSystem\Domain\Payment\Test;

use PHPUnit\Framework\TestCase;
use RstGroup\ConferenceSystem\Domain\Payment\AtLeastTenEarlyBirdSeatsDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\FreeSeatDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\SeatsStrategyConfiguration;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class DiscountServiceTest extends TestCase
{
    /**
     * @test
     */
    public function returns_price_discounted_by_15_percent_if_at_least_10_early_bird_seats_are_bought()
    {
        $discountService = new DiscountService();
        $seat = new Seat('early bird', 10);
        $regularPrice = 7;

        $discountStrategies = [new AtLeastTenEarlyBirdSeatsDiscountStrategy()];

        $price = $discountService->calculateForSeat($seat, $regularPrice, $discountStrategies);
        $this->assertEquals(59.5, $price, 0.01);
    }
}
