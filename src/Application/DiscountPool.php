<?php
/**
 * Created by PhpStorm.
 * User: rst_user
 * Date: 23.08.2017
 * Time: 14:34
 */

namespace RstGroup\ConferenceSystem\Application;


use RstGroup\ConferenceSystem\Domain\Reservation\Seat;

interface DiscountPool
{
  public function getDiscount(Seat $seat): int;
}