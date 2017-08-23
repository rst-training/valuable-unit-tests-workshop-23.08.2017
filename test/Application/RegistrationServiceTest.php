<?php

namespace RstGroup\ConferenceSystem\Application\RegistrationService\Test;

use PHPUnit\Framework\TestCase;
use RstGroup\ConferenceSystem\Domain\Reservation\ConferenceId;
use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;

use src\Application\RegistrationService;

class RegistrationServiceTest extends TestCase {
    private function getConference($conferenceId) {
        return $this->getConferenceRepository()->get(new ConferenceId($conferenceId));
    }
    /**
    * @test
    */
    // public function should_return_calculated_items_costs_with_discount() {
    //     $payPalPaymentsMock = $this->getMockBuilder(new PaypalPayments());
    //     $this->expects($payPalPaymentsMock)->method('getApprovalLink')->with($this->getConference())->willReturn();
    // }

    /**
    * @test
    */
    public function should_calculate_price_for_one_seat() {
        $discountServiceConfigurationMock = array();
        $avaliablePricesMock = array(
            "foo" => [10],
        );
        $seatMock = new Seat('foo', 1);
        $dicountServiceMock = new DiscountService();
        $calculatedSeatPrice = calculateSeatPrice($seatMock, $avaliablePricesMock, $dicountServiceMock);
        $this->assertEquals($calculatedSeatPrice, 10);
    }
}
?>