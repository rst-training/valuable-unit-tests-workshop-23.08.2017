<?php

namespace RstGroup\ConferenceSystem\Application;

use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Reservation\ConferenceId;
use RstGroup\ConferenceSystem\Domain\Reservation\SeatsCollection;
use RstGroup\ConferenceSystem\Infrastructure\Reservation\ConferenceSeatsDaoPdo;

class TotalCost
{
    private $conferenceSeatsDao;
    private $discountService;

    public function __construct(ConferenceSeatsDaoPdo $conferenceSeatsDao, DiscountService $discountService)
    {

        $this->conferenceSeatsDao = $conferenceSeatsDao;
        $this->discountService = $discountService;
    }

    public function calculate(ConferenceId $conferenceId, SeatsCollection $seats)
    {
        $totalCost = 0;
        $seatsPrices = $this->conferenceSeatsDao->getSeatsPrices($conferenceId);

        foreach ($seats->getAll() as $seat) {
            $priceForSeat = $seatsPrices[$seat->getType()][0];

            $dicountedPrice = $this->discountService->calculateForSeat($seat, $priceForSeat);
            $regularPrice = $priceForSeat * $seat->getQuantity();

            $totalCost += min($dicountedPrice, $regularPrice);
        }

        return $totalCost;
    }
}