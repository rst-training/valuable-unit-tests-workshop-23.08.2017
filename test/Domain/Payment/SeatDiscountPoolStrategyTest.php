<?php

namespace RstGroup\ConferenceSystem\Domain\Payment\Test;

use PHPUnit\Framework\TestCase;
use RstGroup\ConferenceSystem\Domain\Payment\SeatDiscountPoolStrategy;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class SeatDiscountPoolStrategyTest extends TestCase
{
    /**
     * @test
     */
    public function should_not_give_discount_when_there_are_no_discounts_available()
    {
        //given
        $strategy = new SeatDiscountPoolStrategy(0, 50);
        //when
        $priceAfterDicount = $strategy->calculate(new Seat('default', 1), 100);
        //then
        $this->assertEquals(100, $priceAfterDicount);
    }

    /**
     * @test
     */
    public function should_give_discount_for_one_seat_when_discounts_are_available()
    {
        //given
        $strategy = new SeatDiscountPoolStrategy(10, 50);
        //when
        $priceAfterDicount = $strategy->calculate(new Seat('default', 1), 100);
        //then
        $this->assertEquals(50, $priceAfterDicount);
    }

    /**
     * @test
     */
    public function should_give_discount_to_one_seat_of_two_when_only_one_discount_is_available()
    {
        //given
        $strategy = new SeatDiscountPoolStrategy(1, 50);
        //when
        $priceAfterDicount = $strategy->calculate(new Seat('default', 2), 100);
        //then
        $this->assertEquals(150, $priceAfterDicount);
    }

    /**
     * @test
     */
    public function should_give_discount_to_all_10_seats_when_10_seats_are_available()
    {
        //given
        $strategy = new SeatDiscountPoolStrategy(10, 50);
        //when
        $priceAfterDicount = $strategy->calculate(new Seat('default', 10), 100);
        //then
        $this->assertEquals(500, $priceAfterDicount);
    }

    /**
     * @test
     */
    public function should_give_5_discounts_for_first_reservation_and_only_5_for_second_reservation()
    {
        //given
        $strategy = new SeatDiscountPoolStrategy(10, 50);
        //when
        $priceAfterDicount1 = $strategy->calculate(new Seat('default', 5), 100);
        $priceAfterDicount2 = $strategy->calculate(new Seat('default', 10), 100);
        //then
        $this->assertEquals(250, $priceAfterDicount1);
        $this->assertEquals(750, $priceAfterDicount2);
    }



}