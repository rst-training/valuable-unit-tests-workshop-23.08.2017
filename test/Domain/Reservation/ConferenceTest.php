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

    public function testExistenceOfReservation();
    public function testForAvailableNumOfSeats();
    public function testOrderIdExistenceThrowingException();
    public function testNumOfSeatsVsSeatsAvailability();
    public function testQuantityAfterAddingToWaitList();
    public function testQuantityAfterAddingReservation();
    public function testSeatsAfterSeatsReservation();
    public function testSeatsQuantityAfterSeatsReservation();
    public function testIfSeatIsOccupiedAfterMakeReservation();
    public function testMakeReservationForOrderWhichAlreadyExist();
    public function testMakeReservationForOrderForNonexistingOrder();


}
