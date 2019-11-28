<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\PaymentMethod;
use Stripe\Stripe;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        return view('home', [
            'paymentMethods' => $user->paymentMethods()
        ]);
    }

    public function store()
    {
        Stripe::setApiKey(config('services.stripe.key'));

        $paymentMethod = PaymentMethod::create([
            'type' => 'card',
            'card' => [
                'number' => '4242424242424242',
                'exp_month' => 11,
                'exp_year' => 2020,
                'cvc' => '314',
            ],
        ]);

        auth()->user()->addPaymentMethod($paymentMethod);

        return back()->with('status', 'Successful');
    }
}
