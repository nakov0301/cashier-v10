# Installing Cashier V10 with Laravel v6

Run the following commands:

 - composer install
 - npm install
 - php artisan migrate
 
Edit `.env` and set your Stripe keys:

```
STRIPE_KEY=
STRIPE_SECRET=
```

### Note

This repo was created after a discussion on Laracasts forum:
https://laracasts.com/discuss/channels/laravel/how-to-use-cashier-v10-in-laravel-6

The payment method could not be attached using the client side code, so the work-around as of now is to use server-side.

The card details are hard-coded, that's a stripe test account.
