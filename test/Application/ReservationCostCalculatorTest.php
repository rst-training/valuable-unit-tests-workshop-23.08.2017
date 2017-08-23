<?php

namespace RstGroup\ConferenceSystem\Application;

use PHPUnit\Framework\TestCase;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;
use RstGroup\ConferenceSystem\Domain\Reservation\SeatsCollection;

class RegistrationServiceTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_calculate_reservation_cost_given_reservation_with_3_seats_off_simple_type_using_default_discount_policy()
    {
        //given
        $expectedCost = 100;
        $seats = new SeatsCollection();
        $seats->add(new Seat('normal', 1));
        $seatPrices = array("normal" => "100");
        $discountService = $this->getMockBuilder(DiscountService::class)->getMock();
        $discountService->method("calculateForSeat")->willReturn(100);
        $calculator = new ReservationCostCalculator($discountService);
        //when
        $totalCost = $calculator->calculateCost($seats, $seatPrices);
        //then
        $this->assertEquals($totalCost, $expectedCost);
    }
}
