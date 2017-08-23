<?php

namespace RstGroup\ConferenceSystem\Domain\Reservation\Test;

use PHPUnit\Framework\TestCase;

class RegistrationServiceTest extends TestCase
{
    public function test_calculates_costs_with_discount_when_confirming_order()
    {
        // given
        $expectedCost = 200
        $conferenceId = 1234
        $orderId = 987

        $conferenceMock = $this->getMockBuilder(Conference::class)->getMock()
        $conferenceMock->expects()
                ->method('getReservations')
                ->willReturn()

        $conferenceRepositoryMock = $this->getMockBuilder(ConferenceMemoryRepository::class)
        $conferenceRepositoryMock->expects()
                ->method('get')
                ->with($conferenceId)
                ->willReturn($conferenceMock)

        // expects
        $paypalPayments = $this->getMockBuilder(PaypalPayments::class)->getMock()
        $paypalPayments->expects()
                ->method('calculateForSeat')
                ->with($seat, $expectedCost)
                ->willReturn('approvalLink')

        $registrationService = $this->getMockBuilder(RegistrationService::class)
                ->setMethods(['getPaypalPayments', 'getConferenceRepository'])
                ->getMock()
        $registrationService->expects()
                ->method('getPaypalPayments')
                ->willReturn($paypalPayments)
        $registrationService->expects()
                ->method('getConferenceRepository')
                ->willReturn($conferenceRepositoryMock)

        // when
        $registrationService->confirmOrder($orderId, $conferenceId)
    }
}
