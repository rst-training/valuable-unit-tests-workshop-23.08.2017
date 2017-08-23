<?php

namespace RstGroup\ConferenceSystem\Domain\Payment\Test;

use PHPUnit\Framework\TestCase;
use RstGroup\ConferenceSystem\Domain\Payment\AtLeastTenEarlyBirdSeatsDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\FreeSeatDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\SeatDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\SeatsStrategyConfiguration;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class DiscountServiceTest extends TestCase
{
    /** @test */
    public function returns_discounted_price_of_the_last_strategy()
    {
        $configuration = $this->getMockBuilder(SeatsStrategyConfiguration::class)->getMock();
        $discountService = new DiscountService($configuration);
        $seat = new Seat('workshops', 10);

        $strategy1 = $this->strategyReturningDiscountedPrice(1);
        $strategy2 = $this->strategyReturningDiscountedPrice(2);
        $strategy3 = $this->strategyReturningDiscountedPrice(3);

        $configuration
            ->expects($this->any())
            ->method('discountStrategiesFor')
            ->with($seat)
            ->willReturn([$strategy1, $strategy2, $strategy3]);

        $this->assertEquals(3, $discountService->calculateForSeat($seat, 7));
    }

    private function strategyReturningDiscountedPrice(float $discountedPrice): SeatDiscountStrategy
    {
        $strategy = $this->getMockBuilder(SeatDiscountStrategy::class)->getMock();
        $strategy->expects($this->any())->method('calculate')->willReturn($discountedPrice);

        return $strategy;
    }

}
