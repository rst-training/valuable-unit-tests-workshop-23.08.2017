<?php

namespace RstGroup\ConferenceSystem\Application\Test;

use PHPUnit\Framework\TestCase;
use RstGroup\ConferenceSystem\Application\RegistrationService;
use RstGroup\ConferenceSystem\Domain\Payment\AtLeastTenEarlyBirdSeatsDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\FreeSeatDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;
use RstGroup\ConferenceSystem\Domain\Payment\SeatsStrategyConfiguration;
use RstGroup\ConferenceSystem\Domain\Reservation\Conference;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class RegistrationServiceTest extends TestCase
{
    /**
     * @test
     */
    public function confirmOrderShouldSendCalculatedCostToPaypalServiceForGivenOrderIdAndConference()
    {
        $expectedTotalCost = 100;

        $conferenceMock = $this->getMockBuilder(Conference::class)
            ->getMock();

        $paypalServiceMock = $this->getMockBuilder(PaypalPayments::class)
            ->setMethods(['getApprovalLink'])
            ->getMock();

        $paypalServiceMock->expects($this->once())
            ->method('getApprovalLink')
            ->with($this->equalTo($conferenceMock), $this->equalTo($expectedTotalCost));

        $registrationServiceMock = $this->createMock(RegistrationService::class);

        $registrationServiceMock->method('getPaypalPayments')
            ->willReturn($paypalServiceMock);

    }
}
