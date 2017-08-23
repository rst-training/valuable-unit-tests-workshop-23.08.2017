<?php
/**
 * Created by PhpStorm.
 * User: kmenzyk
 * Date: 23.08.17
 * Time: 11:28
 */

namespace RstGroup\ConferenceSystem\Infrastructure\Reservation;

use RstGroup\ConferenceSystem\Domain\Reservation\ConferenceId;

interface ConferenceSeatsDao
{
    /**
     * @return []
     */
    public function getSeatsPrices(ConferenceId $conferenceId): array;
}