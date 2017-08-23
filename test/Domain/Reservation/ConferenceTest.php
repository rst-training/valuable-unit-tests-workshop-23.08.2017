<?php

namespace RstGroup\ConferenceSystem\Domain\Reservation\Test;

use PHPUnit\Framework\TestCase;

class ConferenceTest extends TestCase
{
    /**
     * @todo: remove it
     */
    public function test_example_name()
    {
        $this->markTestSkipped();
    }

    public function makeReservationForOrderShouldThrowExceptionIfReservationWithGivenOrderIdAlreadyExist(){
        $this->markTestSkipped();
    }

    public function makeReservationForOrderShouldAddNewReservationWithGivenOrderIdToWaitListIfAvailableSeatsQuantityOfGivenTypeIsLowerThenInNewReservation() {
        $this->markTestSkipped();
    }

    public function makeReservationForOrderShouldAddNewReservationWithGivenOrderIdIfThereIsEnoughtAvailableSeatsOfGivenType() {
        $this->markTestSkipped();
    }
}
