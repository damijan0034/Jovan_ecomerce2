<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Paypal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;

class PaypalController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway=Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId('AQHExLzdZ0Rty-U1NUUbiFswqPvMCqu2n8eif_BdM6hQlDq_YiL7pM0YXQ6F0UDVBFD7p8zwDwI8eV8j');
        $this->gateway->setSecret('ED9lUXy7dOG9NjuMKbHZOouqKv07gabfyUceBJeFnCjowwffoXnz2zP_XvykNYLu7EYrCzD0DjMVFZvV');
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            $response=$this->gateway->purchase(array(
                'amount'=>$request->amount,
                'currency'=>env('PAYPAL_CURRENCY'),
                'returnUrl'=>url('success'),
                'cancelUrl'=>url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if($request->input('paymentId') && $request->input('PayerID') ){
            $transaction=$this->gateway->completePurchase(array(
                'payer_id'=>$request->input('PayerID'),
                'transactionReference'=>$request->input('paymentId')
            ));
            $response=$transaction->send();

            if ($response->isSuccessful()) {

                $arr=$response->getData();

                $payment=new Paypal();
                $payment->payment_id=$arr['id'];
                $payment->payer_id=$arr['payer']['payer_info']['payer_id'];
                $payment->payer_email=$arr['payer']['payer_info']['email'];
                $payment->amount=$arr['transactions'][0]['amount']['total'];
                $payment->currency=env('PAYPAL_CURRENCY');
                $payment->payment_status=$arr['state'];

                $payment->save();

               
                $userId=auth()->user()->id;
                $carts=Cart::where('user_id',$userId)->get();
                
                 foreach($carts as $cart){{ 
                     $cart->delete();
                  }}
                // return "Payment is successful.Your transaction Id is:" .$arr['id'];
                return redirect('/')->with('message','Payment is successful');
          
            }
            else {
                return $response->getMessage();
            }
        }
        else {
            return 'Payment declined!!';
        }
    }

    public function error ()
    {
        return "User declined payment";
}
}
