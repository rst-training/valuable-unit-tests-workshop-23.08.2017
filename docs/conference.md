kkedzierski

cancellation method test - description of method:

Conference Cancellation method should behave:

If
    Order doesnt exist
Then
    Throw Exception

If
    Cancellation is finished
Then 
    Reservation should be removed

If
    Offer is cancelled
Then
    Seats availability should be incremented to state before offer set

If
    OfferIsCancelled and waitList is Empty
Then
    pass

If
    Offer is cancelled
Then
    It should be possible to create reservation for first reservation from waitlist

If
    Offer is cancelled
Then
    It should be possible to create reservation for all reservations from waitlist


