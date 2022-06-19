@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center">All Payments</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Payment ID</th>
                <th scope="col">Payer ID</th>
                <th scope="col">Payer Email</th>
                <th>Amount</th>
                <th>Currency</th>
                <th>Payment Status</th>
                <th>Date</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->payment_id }}</td>
                <td>{{ $payment->payer_id }}</td>
                <td>{{ $payment->payer_email }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->currency }}</td>
                <td>{{ $payment->payment_status }}</td>
                <td>{{ $payment->created_at }}</td>
            </tr>
           
            @endforeach


        </tbody>
    </table>
    {{ $payments->links() }}
</div>
<style>
    .w-5{
        display: none;
    }
</style>
@endsection