<?php

namespace App\Http\Controllers;
use PaytmWallet;
use Illuminate\Http\Request;
use App\Models\EventRegistration;
use Razorpay\Api\Api;
use Session;
use Exception;
  
class PaymentController extends Controller
{
    //
     /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */

    // public function order(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'mobile_no' => 'required|numeric|digits:10|unique:event_registration,mobile_no',
    //         'address' => 'required',
    //     ]);
    
    //     $input = $request->all();
    //     $input['order_id'] = $request->mobile_no.rand(1,100);
    //     $input['fee'] = 50;
    
    //     EventRegistration::create($input);
    
    //     $payment = PaytmWallet::with('receive');
    
    //     $payment->prepare([
    //         'order' => $input['order_id'],
    //         'user' => '1',
    //         'mobile_number' => $input['mobile_no'],
    //         'email' => 'dattajadhav7263@gmail.com',
    //         'amount' => $input['fee'],
    //         'callback_url' => url('api/payment/status')
    //     ]);

    //    return $payment;
    
    //     return $payment->receive();
    // }

    public function order(Request $request){
        $input = $request->all();
  
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }
        }
          
        Session::put('success', 'Payment successful');
        return redirect()->back();
    }
    


    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');


        $response = $transaction->response();
        $order_id = $transaction->getOrderId();


        if($transaction->isSuccessful()){
          EventRegistration::where('order_id',$order_id)->update(['status'=>2, 'transaction_id'=>$transaction->getTransactionId()]);


          dd('Payment Successfully Paid.');
        }else if($transaction->isFailed()){
          EventRegistration::where('order_id',$order_id)->update(['status'=>1, 'transaction_id'=>$transaction->getTransactionId()]);
          dd('Payment Failed.');
        }
    }
}
