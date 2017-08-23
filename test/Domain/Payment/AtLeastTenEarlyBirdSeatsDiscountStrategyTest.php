<?php

namespace RstGroup\ConferenceSystem\Domain\Payment\Test;

use PHPUnit\Framework\TestCase;
use RstGroup\ConferenceSystem\Domain\Payment\AtLeastTenEarlyBirdSeatsDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\FreeSeatDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\SeatsStrategyConfiguration;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class AtLeastTenEarlyBirdSeatsDiscountStrategyTest extends TestCase
{
    /** @test */
    public function returns_price_discounted_by_15_percent_if_at_least_10_early_bird_seats_are_bought()
    {
        $strategy = new AtLeastTenEarlyBirdSeatsDiscountStrategy();

        $this->assertEquals(
            59.5,
            $strategy->calculate(new Seat('workshops', 10), 7, null)
        );
    }

    /** @test */
    public function returns_old_discounted_price_if_less_than_10_early_bird_seats_are_bought()
    {
        $strategy = new AtLeastTenEarlyBirdSeatsDiscountStrategy();

        $this->assertEquals(
            20.0,
            $strategy->calculate(new Seat('workshops', 9), 7, 20.0)
        );
    }
}
