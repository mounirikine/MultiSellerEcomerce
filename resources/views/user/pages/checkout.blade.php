@extends('user.layouts.main')

@section('content')
    <!-- Payment Method Selection Area Start -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3 text-center">
                <h2>Choose Your Payment Method</h2>
            </div>
        </div>

        


        <div class="row justify-content-center align-items-center" style="height:30vh">
            <div class="col-md-12 mt-3 mb-4">
                <div class="d-flex justify-content-around">
                    <a class="payment-button" href="{{route('check.information')}}">Cash on Delivery</a>
                    <button class="payment-button" >Online Payment</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Payment Method Selection Area End -->

    <style>
        .payment-button {
            text-align: center;
            width: 300px;
            background-color: black;
            color: white;
            width: 300px;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .payment-button:hover {
            background-color: orange;
            color: black;
        }
    </style>

@endsection
