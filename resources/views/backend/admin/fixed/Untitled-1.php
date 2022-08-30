<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RequestDetails;
use App\Models\RequestProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Coupon;
use PhpParser\Node\Stmt\TryCatch;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('exampleEasycheckout');
    }

    public function exampleHostedCheckout()
    {
        return view('exampleHosted');
    }

    public function index(Request $request)
    {

        // dd($request->all());
        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        try {
            $post_data['total_amount'] = array_sum(array_column(session()->get('cart'),'subtotal'))+50-(session()->get('coupon')['discount']);
        } catch (\Throwable $th) {
            $post_data['total_amount'] = array_sum(array_column(session()->get('cart'),'subtotal'))+50;
        }
         # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique
        // dd($post_data);
        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $request->name;
        $post_data['cus_email'] = $request->email;
        $post_data['cus_add1'] = $request->Address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $request->mobile;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.
        // $update_product = DB::table('orders')
        //     ->where('transaction_id', $post_data['tran_id'])
        //     ->updateOrInsert([
        //         'name' => $post_data['cus_name'],
        //         'email' => $post_data['cus_email'],
        //         'phone' => $post_data['cus_phone'],
        //         'amount' => $post_data['total_amount'],
        //         'status' => 'Pending',
        //         'address' => $post_data['cus_add1'],
        //         'transaction_id' => $post_data['tran_id'],
        //         'currency' => $post_data['currency']
        //     ]);


try{
        $order = order::create([
            'user_id' => auth()->user()->id,
            'tran_id' => $post_data['tran_id'],
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'Address' => $request->Address,
            'total' =>array_sum(array_column(session()->get('cart'),'subtotal'))+50-(session()->get('coupon')['discount']),
            
        ]);
    
}catch (\Throwable $th){
    $order = order::create([
        'user_id' => auth()->user()->id,
        'tran_id' => $post_data['tran_id'],
        'name' => $request->name,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'Address' => $request->Address,
        'total' =>array_sum(array_column(session()->get('cart'),'subtotal'))+50,
        
    ]);
}
        
        $carts = session()->get('cart');
        if ($carts) {
            $total = 0;
            $request = RequestProduct::create([
                'user_id' => auth()->user()->id,

            ]);
            foreach ($carts as $key => $cart) {
                RequestDetails::create([

                    'user_id' => auth()->user()->id,
                    'order_id'=>$order->id,
                    'request_id' => $request->id,
                    'tran_id' => $post_data['tran_id'],
                    'product_id' => $cart['product_id'],
                    'quantity' => $cart['product_qty'],
                    'price' =>$cart['product_price'],
                    'sub_total' => $cart['product_price'] * $cart['product_qty'],
                    // 'total_price' => $total += $cart['product_price'] * $cart['product_qty'],
                ]);
                $product = Product::find($key);
                $product->decrement('qty', $cart['product_qty']);
            }

            $token = Str::random(64);
            $newOrder=Order::where('id',$order->id)->with('RequestDetails','RequestDetails.product')->first();
            Mail::send('website.email.orderConfirm',compact('newOrder'), function ($message) use ($request) {
                $message->to(auth()->user()->email);
                $message->subject('order confirem'); 
            });

            if($session=session()->has('coupon')){
                $session=session()->get('coupon')['name'];
            // dd($session);
            $coupon=Coupon::where('code',$session)->first();
            $coupon->update([
                'expiry_date'=>'2022-08-23',
            ]);
            }
            session()->forget('cart');
            session()->forget('coupon');
            // $coupon=Coupon::find($id);
            // return redirect(route('manage.home'))->with('message', 'request placed Successfully');
        }
        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
        // return redirect()->back()->with('message', 'No data found in cart');
    }



    public function success(Request $request)
    {
        session()->forget('cart');
        session()->forget('coupon');

        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_details = order::where('tran_id', $tran_id)->first();

        if ($order_details->status == 'pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $order_details->update([
                    'payment_status' => 'success'
                ]);
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $order_details->update([
                    'payment_status' => 'failed'
                ]);
            }
        }
        return redirect()->route('manage.home')->with('message', 'Payment Successfull');
    }


    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = RequestDetails::where('tran_id', $tran_id)->first();
        if ($order_details->status == 'pending') {
            $order_details->update([
                'payment_status' => 'failed'
            ]);
        }

        return redirect()->route('manage.home')->with('message', 'Payment Failed');
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_details = RequestDetails::where('tran_id', $tran_id)->first();
        if ($order_details->status == 'pending') {
            $order_details->update([
                'payment_status' => 'cancel'
            ]);
        }

        return redirect()->route('manage.home')->with('message', 'Payment Cancle');
    }
}






if (!function_exists('getWinAndLoseTeam')) {

    function getWinAndLoseTeam($team_id, $division_id, $season_id): array
    {
        $data = [];
        $result = Fixture::where('season_id', $season_id)
            ->where('division_id', $division_id)
            ->where('home_team_id', $team_id)->orWhere('away_team_id', $team_id)
            ->get();
        if ($result->count() > 0) {
            if ($result[0]->home_team_id == $team_id) {
                $data['win'] = $result->sum('is_home_team_win');
                $data['lose'] = $result->sum('is_home_team_lose');
            } else {
                $data['win'] = $result->sum('is_away_team_win');
                $data['lose'] = $result->sum('is_away_team_lose');
            }
        }
        return $data;
    }

}