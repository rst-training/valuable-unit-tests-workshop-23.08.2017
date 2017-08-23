<?php

namespace RstGroup\ConferenceSystem\Application\Test;

use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use RstGroup\ConferenceSystem\Application\RegistrationService;
use RstGroup\ConferenceSystem\Application\TotalCost;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;
use RstGroup\ConferenceSystem\Domain\Reservation\Conference;
use RstGroup\ConferenceSystem\Domain\Reservation\ConferenceId;
use RstGroup\ConferenceSystem\Domain\Reservation\ReservationsCollection;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;
use RstGroup\ConferenceSystem\Domain\Reservation\SeatsAvailabilityCollection;
use RstGroup\ConferenceSystem\Domain\Reservation\SeatsCollection;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceMemoryRepository;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceSeatsDaoPdo;

class TotalCostTest extends TestCase
{
    /** @test */
    public function it_returns_a_price_with_a_discount_when_a_discounted_price_for_the_seat_is_lower_than_a_regular_price()
    {
        $conferenceId = new ConferenceId(1);
        $seats = new SeatsCollection();
        $seat = new Seat('workshops', 1);
        $seats->add($seat);

        $conferenceSeatsDao = $this->prophesize(ConferenceSeatsDaoPdo::class);
        $conferenceSeatsDao->getSeatsPrices($conferenceId)->willReturn(['workshops' => [100]]);

        $discountService = $this->prophesize(DiscountService::class);
        $discountService->calculateForSeat($seat, 100)->willReturn(50);

        $totalCost = new TotalCost($conferenceSeatsDao->reveal(), $discountService->reveal());

        $this->assertEquals(50, $totalCost->calculate($conferenceId, $seats));
    }
}
