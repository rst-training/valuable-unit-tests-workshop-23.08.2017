<?php

namespace RstGroup\ConferenceSystem\Domain\Reservation\Test;

use PHPUnit\Framework\TestCase;
use RstGroup\ConferenceSystem\Application\RegistrationService;


class RegistrationServiceTest extends TestCase
{
  /**
  * @test
  */
    public function return_correct_calculation_total_cost_for_reservation()
    {
      $discount = 0;

      $registrationService = new RegistrationService();

      $seatsPrices = [];
      $seats = [];
      $discountService = $this->getMockBuilder(DiscountService::class)->getMock();
      $discountService->expects($this->at(1))->method('calculateForSeat')->with($this->any(),$this->any())->willReturn($discount);

      $totalCount = $registrationService->getTotalCost($discountService,$seatsPrices,$seats);

      $this->assertEquals($totalCount,0);
    }
}
