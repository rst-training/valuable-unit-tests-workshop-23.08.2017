<?php


namespace RstGroup\ConferenceSystem\Domain\Reservation;


class OrderId
{
    protected $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}