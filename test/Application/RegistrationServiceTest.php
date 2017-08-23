<?php

namespace RstGroup\ConferenceSystem\Application\Test;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use RstGroup\ConferenceSystem\Application\RegistrationService;
use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;
use RstGroup\ConferenceSystem\Domain\Reservation\Conference;
use RstGroup\ConferenceSystem\Domain\Reservation\ConferenceId;
use RstGroup\ConferenceSystem\Domain\Reservation\ReservationsCollection;
use RstGroup\ConferenceSystem\Domain\Reservation\SeatsAvailabilityCollection;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceMemoryRepository;

class RegistrationServiceTest extends TestCase
{
    /** @test */
    public function it_discounts_total_cost_when_confirms_order()
    {
        $paypalPayments = $this->prophesize(PaypalPayments::class);
        $registrationService = new TestRegistrationService($paypalPayments->reveal());

        $registrationService->getConferenceRepository()->add(new Conference(new ConferenceId(1), new SeatsAvailabilityCollection(), new ReservationsCollection(), new ReservationsCollection()));
        $paypalPayments->getApprovalLink(Argument::any(), 0.01);

        $registrationService->confirmOrder(1, 1);
    }
}

class TestRegistrationService extends RegistrationService
{
    private $paypalPayments;

    public function __construct(PaypalPayments $paypalPayments)
    {
        $this->paypalPayments = $paypalPayments;
    }

    protected function getPaypalPayments(): PaypalPayments
    {
        return $this->paypalPayments;
    }

    public function getConferenceRepository(): ConferenceMemoryRepository
    {
        return parent::getConferenceRepository();
    }
}
