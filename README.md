# Project 1: Booking Appointment
![TrustMedis](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/logotype.png "Logo TrustMedis")

#### This is an application that allow users to book an appointment with doctor specialist.

### Built With
* [Laravel 8](https://python.org/)
* [Fortify Auth](https://github.com/laravel/fortify)
* [PostgreSQL](https://postgresql.org/)
* [Bootstrap 5](https://getbootstrap.com)
* [jQuery](https://jquery.com)
* [OwlCarousel2](https://owlcarousel2.github.io/OwlCarousel2/)
* [SwiperJS](https://swiperjs.com/)
* [Date Range Picker](https://www.daterangepicker.com/)
* [SweetAlert2](https://sweetalert2.github.io/)
* [NiceScroll](https://nicescroll.areaaperta.com/)
* [Google reCAPTCHA](https://google.com/recaptcha/about/)
* [Midtrans](https://midtrans.com)

## Getting Started
Follow this step guide to prepare the requirement system before using the apps
1. Download and install [Composer](https://getcomposer.org/)
2. Clone this repo
    ```sh
   git clone https://github.com/Fq2112/tm-booking-appointment.git
   ```
3. Update the composer
    ```sh
   composer update
   ```
4. Copy ``.env.example`` file and rename it to ``.env`` 
5. Adjust ``.env`` file based on your device environment
6. Generate new key
    ```sh
   php artisan key:generate
    ```
7. Turn on your postgreSql server and run this command
    ```sh
   php artisan migrate:fresh --seed
   ```
8. Run the apps
    ```sh
   php artisan serve
   ```
9. Open it on your browser
    ```sh
   http://localhost:8000
   ```

## Overview

### A. Landing Page
There are 4 sections on this page
1. ![Landing 1](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/landing_1.png "Landing 1")
2. ![Landing 2](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/landing_2.png "Landing 2")
2. ![Landing 3](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/landing_3.png "Landing 3")
2. ![Landing 4](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/landing_4.png "Landing 4")

### B. Authentication
Only 3 auth features on this app, i.e: Sign Up, Sign In, Sign Out
1. ![Auth 1](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/signup_modal.png "Auth 1")
2. ![Auth 2](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/signup_succeed.png "Auth 2")
3. ![Auth 3](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/signin_modal.png "Auth 3")
4. ![Auth 4](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/signin_succeed.png "Auth 4")

### C. Booking Form
Midtrans is not working for localhost anymore, even in sandbox/testing mode
1. ![Book 1](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/booking_1.png "Book 1")
2. ![Book 2](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/booking_2.png "Book 2")
3. ![Book 3](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/booking_3.png "Book 3")
4. ![Book 4](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/booking_4.png "Book 4")
5. ![Book 5](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/booking_5.png "Book 5")
6. ![Book 6](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/booking_6.png "Book 6")
7. ![Book 7](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/booking_7.png "Book 7")

### D. Booking History
1. ![List 1](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/history_1.png "List 1")
2. ![List 2](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/history_2.png "List 2")
3. ![List 3](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/history_3.png "List 3")
4. ![List 4](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/history_4.png "List 4")
5. ![List 5](https://github.com/Fq2112/tm-booking-appointment/tree/master/public/images/testing/history_5.png "List 5")
