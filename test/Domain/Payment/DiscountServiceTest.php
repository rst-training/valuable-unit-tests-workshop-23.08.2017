<?php

namespace RstGroup\ConferenceSystem\Domain\Payment\Test;

use PHPUnit\Framework\TestCase;
use RstGroup\ConferenceSystem\Domain\Payment\AtLeastTenEarlyBirdSeatsDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\SeatsStrategyConfiguration;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class DiscountServiceTest extends TestCase
{
    /**
     * @test
     */
    public function returns_price_discounted_by_15_percent_if_at_least_10_early_bird_seats_are_bought()
    {        //given
        $strategies = [
           new AtLeastTenEarlyBirdSeatsDiscountStrategy(new SeatsStrategyConfiguration())
        ];
        $discountService = new DiscountService($strategies);
        $seat = new Seat('earlyBird',10);
        $defaultPrice = 100;
        $expectedPrice = 850;
        //when
        $discount = $discountService->calculateForSeat($seat, $defaultPrice);
        //then
        $this->assertEquals($discount,$expectedPrice);
    }


}
