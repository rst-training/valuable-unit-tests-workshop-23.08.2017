<?php
namespace RstGroup\ConferenceSystem\Domain\Payment;

class TotalPriceCalculator extends TestCase
{
    public function returns_total_price_with_discount_for_one_seat() {
        // given
        $expectedPrice = 400

        $priceForSeat = 500
        $conferenceId = 1234

        $discountService = $this->getMockBuilder(DiscountService::class)->getMock()
        $discountService->expects()
                ->method('calculateForSeat')
                ->with($this->any(), $priceForSeat)
                ->willReturn($expectedPrice)

        $seats = [Seat('type', 1)]

        $reservation = $this->getMockBuilder(Reservation::class)->getMock()
        $reservation->expects()
                ->method('getSeats')
                ->willReturn($seats)

        $seatsPrices = ['type' => [$priceForSeat]]

        $totalPriceCalculator = TotalPriceCalculator($discountService)

        // when
        $price = $totalPriceCalculator->calculatePrice($reservation, $seatsPrices)

        // then
        this->assertEquals($expectedPrice, $price, 0.001)
    }
}
