<?php
namespace RstGroup\ConferenceSystem\Application\Test;

use PHPUnit\Framework\TestCase;
use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;
use RstGroup\ConferenceSystem\Domain\Payment\SeatsStrategyConfiguration;
use RstGroup\ConferenceSystem\Domain\Reservation\ConferenceId;
use RstGroup\ConferenceSystem\Domain\Payment\registrationService;
use RstGroup\ConferenceSystem\Domain\Reservation\OrderId;
use RstGroup\ConferenceSystem\Domain\Reservation\ReservationId;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;
use RstGroup\ConferenceSystem\Domain\Reservation\SeatsCollection;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceSeatsDao;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceMemoryRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RegistrationService extends TestCase
{
    /**
     * @test
     */
    public function compare_calculated_value_with_fixed_sum()
    {
        // tested function calculateTotalCostFromSeats
        // input: seats, seatsPrices
        // output: calculated total cost

        $seats =        array(21, 22, 23, 24);
        $seatsPrices =  array(20, 20, 15, 12);
        $testTotalCost = 100.0;


        $registrationService = new registrationService($configuration);
        $this->assertEquals($testTotalCost, $registrationService->calculateTotalCostFromSeats($seats, $seatsPrices));
    }
}
