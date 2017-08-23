<?php

namespace RstGroup\ConferenceSystem\Application\Test;

use PHPUnit\Framework\TestCase;
use RstGroup\ConferenceSystem\Application\DiscountPool;
use RstGroup\ConferenceSystem\Application\DiscountPoolStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\AtLeastTenEarlyBirdSeatsDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\DiscountService;
use RstGroup\ConferenceSystem\Domain\Payment\FreeSeatDiscountStrategy;
use RstGroup\ConferenceSystem\Domain\Payment\PaypalPayments;
use RstGroup\ConferenceSystem\Domain\Payment\SeatsStrategyConfiguration;
use RstGroup\ConferenceSystem\Domain\Reservation\Conference;
use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class DiscountPoolStrategyTest extends TestCase
{
    /**
     * @test
     */
    public function return_price_is_not_discounted_when_discount_pool_is_empty_for_every_seat()
    {
        //given
        $discountPool = $this->getMockBuilder(DiscountPool::class)->getMock();

        $expectedResult = 100;
        $price = $expectedResult;
        $discountrPoolStrategy = new DiscountPoolStrategy($discountPool);

        //when
        $discountedPrice = $discountrPoolStrategy->foo($price, new Seat("test", 10));

        //then
        $this->assertEquals($expectedResult, $discountedPrice);
    }

    /**
     * @test
     */
    public function return_price_discounted_by_10_if_calculate_discount_for_seat_quantity_less_than_discount_quantity_in_pool() {
        //given
        $discountPool = $this->getMockBuilder(DiscountPool::class)->getMock();
        $discountPool->method('getDiscount')->willReturn(1);

        $discountrPoolStrategy = new DiscountPoolStrategy($discountPool);
        $price = 100;

        //when
        $discountedPrice = $discountrPoolStrategy->foo($price, new Seat("test", 10));

        //then
        $this->assertSame(90, $discountedPrice);
    }
}
