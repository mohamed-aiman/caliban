<script setup>

const reservation = {
    channel: 'Agoda',
    booking_date_time: '2015-12-12T00:00:00',
    reservation_no: '833',
    travel_agent_voucher_no: '331447731',
    guest: {
        name: 'Guest',
        email: 'test@example.com',
        phone: '123-456-7890',
        city: 'New York',
        Country: 'United States',
    },
    stay_information: {
        checkin_date: '2022-09-17',
        checkout_date: '2022-09-18',
        no_of_rooms: 1,
        no_of_children: 1,
        no_of_adults: 1,
        no_of_nights: 1,
        remarks: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed'
    },
    room_details: [
        {
            room_type: 'Single Deluxe Room',
            rate_type: 'BB'
        }
    ],
    days: [
        {
            no_of_children: 1,
            no_of_adults: 1,
            date: '2022-09-17',
            price: 43.99,
            currency: 'USD'
        }
    ],
    payment_details: {
        payment_status: 'PARTIALLY PAID',
        currency: 'USD',
        total_amount_inclusive_tax: 43.99,
        extra_charges: null,
        due_amount: 3.00,
        total_taxes: 7.39,
        supplier_amount: 43.99,
    }


}

</script>

<template>
    <div class="w-full mx-20 space-y-4">
        <h1 class="text-3xl">Add Reservation</h1>

        <div>
            <p class="w-full">Guest Information</p>

        </div>

        <div>
            <p class="w-full">Guest Information</p>
        </div>

    </div>
</template>
