@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul>
                            @foreach($paymentMethods as $method)
                                <li>{{ $method->id }}</li>
                            @endforeach
                        </ul>

                        <form action="{{ route('add.payment') }}" method="post">
                            @csrf

                            <input id="card-holder-name" class="form-control" type="text">

                            <!-- Stripe Elements Placeholder -->
                            <div id="card-element"></div>

                            <button id="card-button">
                                Update Payment Method
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');
    </script>
@endsection
