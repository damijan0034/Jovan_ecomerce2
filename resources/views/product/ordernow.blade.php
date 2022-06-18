@extends('layouts.app')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <table class="table">
         
            <tbody>
              <tr>
                <td>Amount</td>
              <td>$ {{$amount}}</td>
              </tr>
              <tr>
                <td>Tax</td>
                <td>$ 0</td>
              </tr>
              <tr>
                <td>Delivery </td>
                <td>$ 10</td>
              </tr>
              <tr>
                <td>Total Amount</td>
              <td>$ {{$amount+10}}</td>
              </tr>
            </tbody>
          </table>
          <div>
            <form action="{{ route('payment') }}" method="POST" >
              @csrf

              <input type="hidden" name="amount" value="{{ $amount }}">
                <div class="form-group">
                  <textarea name="address" placeholder="enter your address" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                  <label for="payment_method">Payment Method</label> <br> <br>
                  <input type="radio" value="paypal" name="payment_method"> <span>Paypal</span> <br> <br>
                  <input type="radio" value="cash" name="payment_method"> <span>EMI payment</span> <br><br>
                  <input type="radio" value="cash" name="payment_method"> <span>Payment on Delivery</span> <br> <br>

                </div>
                <button type="submit" class="btn btn-success form-control">Pay Pall</button>
              </form>
          </div>
     </div>
</div>
@endsection 