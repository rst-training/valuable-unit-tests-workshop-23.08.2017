<?php

namespace RstGroup\ConferenceSystem\Application;

use PHPUnit\Framework\TestCase;
use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;

class RegistrationServiceTest extends TestCase
{
//    /**
//     * @test
//     */
//    public function returns_price_discounted_by_15_percent_if_at_least_10_early_bird_seats_are_bought()
//    {
//        $configuration = $this->getMockBuilder(SeatsStrategyConfiguration::class)->getMock();
//        $discountService = new DiscountService($configuration);
//        $seat = $this->getMockBuilder(Seat::class)->disableOriginalConstructor()->getMock();
//
//        $configuration->expects($this->at(0))->method('isEnabledForSeat')->with(AtLeastTenEarlyBirdSeatsDiscountStrategy::class)->willReturn(true);
//        $configuration->expects($this->at(1))->method('isEnabledForSeat')->with(FreeSeatDiscountStrategy::class)->willReturn(false);
//        $seat->expects($this->exactly(2))->method('getQuantity')->willReturn(10);
//
//        $this->assertEquals(59.5, $discountService->calculateForSeat($seat, 7), 0.01);
//    }

    /**
     * @test
     */
    public function it_should_pass_calculated_cost_to_paypal_payments()
    {
        //given
        $orderId = 1;
        $conferenceId = 1;
        $paypalPayments = $this->getMockBuilder(PaypalPayments::class)->disableOriginalConstructor()->getMock();

        $registrationService = $this->getMockBuilder(RegistrationService::class)->getMock();
        $registrationService->method('getPaypalPayments')->willReturn($paypalPayments);

        //when
        //$paypalPayments->expects($this->once()->method('getApprovalLink')->with())

        $registrationService->confirmOrder($orderId, $conferenceId);

        //then
    }
}
