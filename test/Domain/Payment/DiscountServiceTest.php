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
        $configuration = $this->getMockBuilder(SeatsStrategyConfiguration::class)->getMock();
        $discountService = new DiscountService($configuration);
        $seat = $this->getMockBuilder(Seat::class)->disableOriginalConstructor()->getMock();

        //zrobic bez mockow: co na wejsciu i wyjsciu
        //te mocki robią:
        //pierwsza znizke włącza
        ////$configuration->expects($this->at(0))->method('isEnabledForSeat')->with(AtLeastTenEarlyBirdSeatsDiscountStrategy::class)->willReturn(true);
        // druga zniżka jest wyłączona
        ////$configuration->expects($this->at(1))->method('isEnabledForSeat')->with(FreeSeatDiscountStrategy::class)->willReturn(false);
        // dwa odpalenia funkcji mają zwrócić 10 zajetych miejsc
        $seat->expects($this->exactly(2))->method('getQuantity')->willReturn(10);



        //przekazać klasę która obsługuje ile jest zniżki
        $this->assertEquals(59.5, $discountService->calculateForSeat($seat, 7, new AtLeastTenEarlyBirdSeatsDiscountStrategy()), 0.01);
        $this->assertEquals(70, $discountService->calculateForSeat($seat, 7, new FreeSeatDiscountStrategy()), 0.01);

    }
}
