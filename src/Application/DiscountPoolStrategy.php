<?php
/**
 * Created by PhpStorm.
 * User: rst_user
 * Date: 23.08.2017
 * Time: 14:17
 */

namespace RstGroup\ConferenceSystem\Application;


use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

class DiscountPoolStrategy
{
    /**
     * @var DiscountPool
     */
    private $discountPool;

    /**
     * DiscountPoolStrategy constructor.
     * @param DiscountPool $discountPool
     */
    public function __construct(DiscountPool $discountPool)
    {
        $this->discountPool = $discountPool;
    }


    public function foo($price, Seat $seat)
    {
        return $price - $seat->getQuantity() * $this->discountPool->getDiscount($seat);
    }
}