<?php

namespace RstGroup\ConferenceSystem\Domain\Reservation\Test;

use PHPUnit\Framework\TestCase;

class ConferenceTest extends TestCase
{
    /**
     * @todo: remove it
     */
    public function testShouldThrowExceptionForNotFoundOrder()
    {
        $this->markTestSkipped();
    }

    public function testShouldIncrementSeatsQuantity() {
        $this->markTestSkipped();
    }

    public function testShouldRemoveReservation() {
        $this->markTestSkipped();
    }

    // Check if seat is moveable
    public function testShouldMarkSeatAsNotMoveable() {
        $this->markTestSkipped();
    }

    public function testShouldMarkSeatAsMoveable() {
        $this->markTestSkipped();
    }

    // Reservation could be moved
    public function testShouldDecrementSeatQuantity() {
        $this->markTestSkipped();
    }
    
    public function testShouldAddReservation() {
        $this->markTestSkipped();
    }

    public function testShouldRemoveReservationFromWaitList() {
        $this->markTestSkipped();
    }

    // Reservation cannot been moved
    public function testShouldNotDecrementSeatQuantity() {
        $this->markTestSkipped();
    }

    public function testShouldNotAddReservation() {
        $this->markTestSkipped();
    }

    public function testShouldNotRemoveReservationFromWaitList() {
        $this->markTestSkipped();
    }
}
